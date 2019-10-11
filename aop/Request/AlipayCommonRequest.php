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
    protected static $apiName;

    public static function api($api, $config = [])
    {
        $instance =  new self($config);
        $instance->setApi($api);
        return $instance;
    }

    public function setApi($api){
        self::$apiName = $api;
    }

    public static function getApiMethodName()
    {
        return self::$apiName;
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
