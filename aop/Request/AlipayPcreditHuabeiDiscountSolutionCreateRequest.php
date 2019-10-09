<?php
/**
 * ALIPAY API: alipay.pcredit.huabei.discount.solution.create request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 11:16:24
 */
class AlipayPcreditHuabeiDiscountSolutionCreateRequest
{
	/** 
	 * 创建方案实例
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
