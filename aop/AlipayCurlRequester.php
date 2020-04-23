<?php

namespace Alipay;

use Alipay\Exception\AlipayCurlException;
use Alipay\Exception\AlipayHttpException;

class AlipayCurlRequester extends AlipayRequester
{
    /**
     * Curl 选项
     *
     * @param array $options
     */
    public $options = [];
    private $fileCharset = "UTF-8";
    protected $postCharset = 'UTF-8';

    public function __construct($options = [])
    {
        $this->options = $options + [
                CURLOPT_FAILONERROR => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ];
        parent::__construct([$this, 'post']);
    }

    /**
     * 发起 POST 请求
     *
     * @param string $url
     * @param $charset
     * @param array $params
     *
     * @return mixed
     * @throws AlipayCurlException
     * @throws AlipayHttpException
     */
    public function post($url, $charset, $params)
    {
        $this->postCharset = $charset;
        $postFields = $params['apiParams'] ?? [];
        $sysParams = $params['sysParams'];
        $url = $this->requestUrl($url, $sysParams);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt_array($ch, $this->options);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $postBodyString = "";
        $encodeArray = array();
        $postMultipart = false;

        if (is_array($postFields) && 0 < count($postFields)) {
            foreach ($postFields as $k => $v) {
                if ("@" != substr($v, 0, 1)) //判断是不是文件上传
                {
                    $postBodyString .= "$k=" . urlencode($this->charset($v, $this->postCharset)) . "&";
                    $encodeArray[$k] = $this->charset($v, $this->postCharset);
                } else //文件上传用multipart/form-data，否则用www-form-urlencoded
                {
                    $postMultipart = true;
                    $encodeArray[$k] = new \CURLFile(substr($v, 1));
                }

            }
            unset ($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($postMultipart) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeArray);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
            }
        }
        if (!$postMultipart) {
            $headers = array('content-type: application/x-www-form-urlencoded;charset=' . $this->postCharset);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);

        if ($response === false) {
            curl_close($ch);
            throw new AlipayCurlException(curl_error($ch), curl_errno($ch));
        }

        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 !== $httpStatusCode) {
            curl_close($ch);
            throw new AlipayHttpException($response, $httpStatusCode);
        }

        curl_close($ch);
        return $response;
    }

    protected function requestUrl($url, $sysParams)
    {
        //系统参数放入GET请求串
        $requestUrl = $url . "?";
        foreach ($sysParams as $sysParamKey => $sysParamValue) {
            $requestUrl .= "$sysParamKey=" . urlencode($this->charset($sysParamValue, $this->postCharset)) . "&";
        }
        $requestUrl = substr($requestUrl, 0, -1);
        return $requestUrl;
    }

    protected function charset($data, $targetCharset)
    {
        if (!empty($data)) {
            $fileType = $this->fileCharset;
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }

}
