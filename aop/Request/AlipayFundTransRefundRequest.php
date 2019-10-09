<?php
/**
 * ALIPAY API: alipay.fund.trans.refund request
 *
 * @author auto create
 * @since 1.0, 2019-07-27 01:14:03
 */
namespace Alipay\Request;

class AlipayFundTransRefundRequest extends AbstractAlipayRequest
{
	/** 
	 * 资金退款
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
