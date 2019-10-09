<?php
/**
 * ALIPAY API: koubei.sales.leads.saleleads.create request
 *
 * @author auto create
 * @since 1.0, 2019-07-26 20:15:43
 */
class KoubeiSalesLeadsSaleleadsCreateRequest
{
	/** 
	 * 口碑销售Leads创建接口
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
