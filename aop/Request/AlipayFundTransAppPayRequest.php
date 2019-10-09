<?php
/**
 * ALIPAY API: alipay.fund.trans.app.pay request
 *
 * @author auto create
 * @since 1.0, 2019-08-06 17:25:24
 */
class AlipayFundTransAppPayRequest
{
	/** 
	 * 无线转账支付接口
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
