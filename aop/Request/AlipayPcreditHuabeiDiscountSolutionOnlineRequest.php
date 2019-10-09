<?php
/**
 * ALIPAY API: alipay.pcredit.huabei.discount.solution.online request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 11:16:24
 */
namespace Alipay\Request;

class AlipayPcreditHuabeiDiscountSolutionOnlineRequest extends AbstractAlipayRequest
{
	/** 
	 * 发布花呗分期商家贴息方案实例
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
