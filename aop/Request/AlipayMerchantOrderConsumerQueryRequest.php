<?php
/**
 * ALIPAY API: alipay.merchant.order.consumer.query request
 *
 * @author auto create
 * @since 1.0, 2019-08-19 15:02:12
 */
class AlipayMerchantOrderConsumerQueryRequest
{
	/** 
	 * 订单详情查询
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
