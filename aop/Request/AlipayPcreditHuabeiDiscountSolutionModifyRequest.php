<?php
/**
 * ALIPAY API: alipay.pcredit.huabei.discount.solution.modify request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 11:16:24
 */
namespace Alipay\Request;

class AlipayPcreditHuabeiDiscountSolutionModifyRequest extends AbstractAlipayRequest
{
	/** 
	 * 更新花呗分期商家贴息方案
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
