<?php
/**
 * ALIPAY API: alipay.open.app.message.topic.subscribe request
 *
 * @author auto create
 * @since 1.0, 2019-07-17 22:00:01
 */
namespace Alipay\Request;

class AlipayOpenAppMessageTopicSubscribeRequest extends AbstractAlipayRequest
{
	/** 
	 * 订阅消息topic
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

}
