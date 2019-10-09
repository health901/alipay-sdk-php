<?php
/**
 * ALIPAY API: alipay.open.app.message.topic.unsubscribe request
 *
 * @author auto create
 * @since 1.0, 2019-07-23 11:20:01
 */
namespace Alipay\Request;

class AlipayOpenAppMessageTopicUnsubscribeRequest extends AbstractAlipayRequest
{
	/** 
	 * 取消订阅关系
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
