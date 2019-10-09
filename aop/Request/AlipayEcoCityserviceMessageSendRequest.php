<?php
/**
 * ALIPAY API: alipay.eco.cityservice.message.send request
 *
 * @author auto create
 * @since 1.0, 2019-06-17 19:45:33
 */
class AlipayEcoCityserviceMessageSendRequest
{
	/** 
	 * 城服用户消息触达
	 **/
	private $bizContent;

	
	public function setBizContent($bizContent)
	{
		$this->bizContent = $bizContent;
		$this->apiParas["biz_content"] = $bizContent;
	}

	public function getBizContent()
	{
		return $this->bizContent;
	}

	public function getApiMethodName()
	{
		return "alipay.eco.cityservice.message.send";
	}

}
