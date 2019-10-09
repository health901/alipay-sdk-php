<?php
/**
 * ALIPAY API: alipay.account.exrate.advice.accept request
 *
 * @author auto create
 *
 * @since  1.0, 2016-05-23 14:55:42
 */

namespace Alipay\Request;

class AlipayCommonRequest extends AbstractAlipayRequest
{
    /**
     * 通用接口
     **/
    private $apiName;

    public static function api($api, $config = [])
    {
        $config['apiName'] = $api;
        return new self($config);
    }

    public function getApiMethodName()
    {
        return $this->apiName;
    }

    public function setParam($key, $value)
    {
        $this->apiParams[$key] = $value;
    }

    public function getParam($key)
    {
        return $this->apiParams[$key] ?? null;
    }

    public function setBizContent($bizContent)
    {
        $this->apiParams['biz_content'] = $bizContent;
    }

    public function getBizContent()
    {
        return $this->apiParams['biz_content'];
    }
}
