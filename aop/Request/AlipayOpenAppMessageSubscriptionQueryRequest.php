<?php
/**
 * ALIPAY API: alipay.open.app.message.subscription.query request
 *
 * @author auto create
 * @since 1.0, 2019-07-23 11:10:01
 */
namespace Alipay\Request;

class AlipayOpenAppMessageSubscriptionQueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 查询消息订阅关系
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
