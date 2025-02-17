<?php

namespace Alipay;

use Alipay\Exception\AlipayBase64Exception;
use Alipay\Exception\AlipayInvalidRequestException;
use Alipay\Exception\AlipayInvalidSignException;
use Alipay\Exception\AlipayOpenSslException;
use Alipay\Key\AlipayKeyPair;
use Alipay\Request\AbstractAlipayRequest;
use Alipay\Signer\AlipayRSA2Signer;
use Alipay\Signer\AlipaySigner;
use ReflectionException;

class AopClient
{
    /**
     * SDK 版本
     */
    const SDK_VERSION = 'alipay-sdk-php-easyalipay-20191227';

    /**
     * API 版本
     */
    const API_VERSION = '1.0';

    /**
     * 应用 ID
     *
     * @var string
     */
    protected $appId;

    /**
     * 签名器
     *
     * @var AlipaySigner
     */
    protected $signer;

    /**
     * 请求发送器
     *
     * @var AlipayRequester
     */
    protected $requester;

    /**
     * 响应解析器
     *
     * @var AlipayResponseFactory
     */
    protected $parser;

    /**
     * 密钥对
     *
     * @var AlipayKeyPair
     */
    protected $keyPair;


    /**
     * 加密方式
     *
     * @var string
     */
    public $encryptType = "AES";
    /**
     * @var 加密密钥
     */
    public $encryptKey;

    /**
     * 创建客户端
     *
     * @param string $appId 应用 ID，请在开放平台管理页面获取
     * @param AlipayKeyPair $keyPair 密钥对，用于存储支付宝公钥和应用私钥
     * @param AlipaySigner $signer 签名器，用于生成和验证签名
     * @param AlipayRequester $requester 请求发送器，用于发送 HTTP 请求
     * @param AlipayResponseFactory $parser 响应解析器，用于解析服务器原始响应
     */
    public function __construct(
        $appId,
        AlipayKeyPair $keyPair,
        AlipaySigner $signer = null,
        AlipayRequester $requester = null,
        AlipayResponseFactory $parser = null
    )
    {
        $this->appId = $appId;
        $this->keyPair = $keyPair;
        $this->signer = $signer === null ? new AlipayRSA2Signer() : $signer;
        $this->requester = $requester === null ? new AlipayCurlRequester() : $requester;
        $this->parser = $parser === null ? new AlipayResponseFactory() : $parser;
    }

    /**
     * 拼接请求参数并签名
     *
     * @param AbstractAlipayRequest $request
     *
     * @param bool $merge
     * @return array
     * @throws AlipayInvalidRequestException
     * @throws ReflectionException
     */
    public function build(AbstractAlipayRequest $request, $merge = true)
    {
        // 组装系统参数
        $sysParams = [];
        $sysParams['app_id'] = $this->appId;
        $sysParams['version'] = static::API_VERSION;
        $sysParams['alipay_sdk'] = static::SDK_VERSION;

        $sysParams['charset'] = $this->requester->getCharset();
        $sysParams['format'] = $this->parser->getFormat();
        $sysParams['sign_type'] = $this->signer->getSignType();

        $sysParams['method'] = $request->getApiMethodName();
        $sysParams['timestamp'] = $request->getTimestamp();
        $sysParams['notify_url'] = $request->getNotifyUrl();
        $sysParams['return_url'] = $request->getReturnUrl();

        // $sysParams['terminal_type'] = $request->getTerminalType();
        // $sysParams['terminal_info'] = $request->getTerminalInfo();
        // $sysParams['prod_code'] = $request->getProdCode();

        $sysParams['auth_token'] = $request->getAuthToken();
        $sysParams['app_auth_token'] = $request->getAppAuthToken();

        // 获取业务参数
        $apiParams = $request->getApiParams();


        /**
         * AES加密
         * @see https://opendocs.alipay.com/open/common/104567#SDK%20%E5%8A%A0%E8%A7%A3%E5%AF%86%E6%94%AF%E6%8C%81
         */

        if ($request->getNeedEncrypt()) {
            if ($this->checkEmpty($apiParams['biz_content'])) {

                throw new AlipayInvalidRequestException(" api request Fail! The reason : encrypt request is not supperted!");
            }

            if ($this->checkEmpty($this->encryptKey) || $this->checkEmpty($this->encryptType)) {

                throw new AlipayInvalidRequestException(" encryptType and encryptKey must not null! ");
            }

            if ("AES" != $this->encryptType) {

                throw new AlipayInvalidRequestException("加密类型只支持AES");
            }
            // 执行加密
            $enCryptContent = AopEncrypt::encrypt($apiParams['biz_content'], $this->encryptKey);
            $apiParams['biz_content'] = $enCryptContent;
            $sysParams["encrypt_type"] = $this->encryptType;
        }

        // 合并参数
        $totalParams = array_merge($apiParams, $sysParams);

        // 转换可能是数组的参数
        if ($request->arrayAsJson) {
            foreach ($totalParams as &$param) {
                if (is_array($param) || is_object($param)) {
                    $param = json_encode($param, JSON_UNESCAPED_UNICODE);
                }
            }
            unset($param);
        }

        // 签名
        $sysParams['sign'] = $this->signer->generateByParams(
            $totalParams,
            $this->keyPair->getPrivateKey()->asResource()
        );

        return $merge ? array_merge($sysParams, $apiParams) : ['sysParams' => $sysParams, 'apiParams' => $apiParams];
    }

    /**
     * 发起请求、解析响应、验证签名
     *
     * @param array $params
     *
     * @param bool $decrypt
     * @return AlipayResponse
     * @throws AlipayBase64Exception
     * @throws AlipayInvalidSignException
     * @throws AlipayOpenSslException
     * @throws Exception\AlipayInvalidResponseException
     */
    public function request($params)
    {
        $raw = $this->requester->execute($params);

        $response = $this->parser->parse($raw);

        $this->signer->verify(
            $response->getSign(),
            $response->stripData(),
            $this->keyPair->getPublicKey()->asResource()
        );

        if (is_string($response->getFirstElement())) {
            $response->decrypt($this->encryptKey);
        }

        return $response;
    }

    /**
     * 一键执行请求
     *
     * @param AbstractAlipayRequest $request
     *
     * @return AlipayResponse
     *
     * @throws AlipayBase64Exception
     * @throws AlipayInvalidSignException
     * @throws AlipayOpenSslException
     * @throws Exception\AlipayInvalidResponseException
     * @see self::build()
     * @see self::request()
     */
    public function execute(AbstractAlipayRequest $request)
    {
        $params = $this->build($request, false);

        $this->parser->setApiName($request::getApiMethodName());

        $response = $this->request($params);

        return $response;
    }

    /**
     * 仅拼接请求参数并签名，但不发起请求
     *
     * @param AbstractAlipayRequest $request
     *
     * @return string
     */
    public function sdkExecute(AbstractAlipayRequest $request)
    {
        $params = $this->build($request);

        return http_build_query($params);
    }

    /**
     * 仅拼接请求参数并签名，生成跳转 URL
     *
     * @param AbstractAlipayRequest $request
     *
     * @return string
     */
    public function pageExecuteUrl(AbstractAlipayRequest $request)
    {
        $queryParams = $this->build($request);
        $url = $this->requester->getGateway() . '?' . http_build_query($queryParams);

        return $url;
    }

    /**
     * 仅拼接请求参数并签名，生成表单 HTML
     *
     * @param AbstractAlipayRequest $request
     *
     * @return string
     */
    public function pageExecuteForm(AbstractAlipayRequest $request)
    {
        $fields = $this->build($request);

        $html = "<form id='alipaysubmit' name='alipaysubmit' action='{$this->requester->getUrl()}' method='POST'>";
        foreach ($fields as $key => $value) {
            if (AlipayHelper::isEmpty($value)) {
                continue;
            }
            $value = htmlentities($value, ENT_QUOTES | ENT_HTML5);
            $html .= "<input type='hidden' name='{$key}' value='{$value}'/>";
        }
        $html .= "<input type='submit' value='ok' style='display:none;'></form>";
        $html .= "<script>document.forms['alipaysubmit'].submit();</script>";

        return $html;
    }

    /**
     * 验证由支付宝服务器发来的回调通知请求，其签名数据是否未被篡改
     *
     * @param array|null $params 请求参数（默认使用 $_POST）
     *
     * @return bool
     */
    public function verify($params = null)
    {
        if ($params === null) {
            $params = $_POST;
        }

        try {
            $this->signer->verifyByParams(
                $params,
                $this->keyPair->getPublicKey()->asResource()
            );
        } catch (AlipayInvalidSignException $ex) {
            return false;
        } catch (\InvalidArgumentException $ex) {
            return false;
        }

        return true;
    }

    /**
     * 解密被支付宝加密的敏感数据
     *
     * @param string $encryptedData Base64 格式的已加密的数据，如手机号
     * @param string $encodedKey Base64 编码后的密钥
     * @param string $cipher 解密算法，保持默认值即可
     *
     * @return string
     *
     * @throws AlipayOpenSslException
     *
     * @see https://docs.alipay.com/mini/introduce/aes
     * @see https://docs.alipay.com/mini/introduce/getphonenumber
     */
    public static function decrypt($encryptedData, $encodedKey, $cipher = 'aes-128-cbc')
    {
        $key = base64_decode($encodedKey);
        if ($key === false) {
            throw new AlipayBase64Exception($encodedKey);
        }

        if (!in_array($cipher, openssl_get_cipher_methods(), true)) {
            throw new AlipayOpenSslException("Cipher algorithm {$cipher} not available");
        }

        $result = openssl_decrypt($encryptedData, $cipher, $key);
        if ($result === false) {
            throw new AlipayOpenSslException();
        }

        return $result;
    }

    /**
     * 获取应用 ID
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * 获取与本客户端关联的密钥对
     *
     * @return AlipayKeyPair
     */
    public function getKeyPair()
    {
        return $this->keyPair;
    }

    /**
     * 获取与本客户端关联的响应解析器
     *
     * @return AlipayResponseFactory
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * 获取与本客户端关联的请求发送器
     *
     * @return AlipayRequester
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * 获取与本客户端关联的签名器
     *
     * @return AlipaySigner
     */
    public function getSigner()
    {
        return $this->signer;
    }

    /**
     * 校验$value是否非空
     *  if not set ,return true;
     *    if is null , return true;
     * @param $value
     * @return bool
     */
    protected function checkEmpty($value)
    {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
    }
}
