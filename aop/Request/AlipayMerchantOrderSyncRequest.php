<?php
/**
 * ALIPAY API: alipay.merchant.order.sync request
 *
 * @author auto create
 * @since 1.0, 2019-06-10 15:35:01
 */
class AlipayMerchantOrderSyncRequest
{
	/** 
	 * 订单数据同步接口
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
