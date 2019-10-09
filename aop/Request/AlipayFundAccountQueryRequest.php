<?php
/**
 * ALIPAY API: alipay.fund.account.query request
 *
 * @author auto create
 * @since 1.0, 2019-08-22 19:10:54
 */
class AlipayFundAccountQueryRequest
{
	/** 
	 * 支付宝资金账户资产查询接口
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
