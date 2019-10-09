<?php
/**
 * ALIPAY API: alipay.marketing.coupon.template.create request
 *
 * @author auto create
 * @since 1.0, 2019-08-12 11:30:01
 */
class AlipayMarketingCouponTemplateCreateRequest
{
	/** 
	 * 创建红包模板
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
