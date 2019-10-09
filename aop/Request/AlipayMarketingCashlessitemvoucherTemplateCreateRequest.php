<?php
/**
 * ALIPAY API: alipay.marketing.cashlessitemvoucher.template.create request
 *
 * @author auto create
 * @since 1.0, 2019-09-06 08:54:44
 */
namespace Alipay\Request;

class AlipayMarketingCashlessitemvoucherTemplateCreateRequest extends AbstractAlipayRequest
{
	/** 
	 * 无资金单品券创建
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
