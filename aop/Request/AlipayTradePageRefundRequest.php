<?php
/**
 * ALIPAY API: alipay.trade.page.refund request
 *
 * @author auto create
 * @since 1.0, 2019-06-19 11:35:01
 */
class AlipayTradePageRefundRequest
{
	/** 
	 * 统一收单退款页面接口
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
