<?php
/**
 * ALIPAY API: koubei.sales.leads.shopleads.create request
 *
 * @author auto create
 * @since 1.0, 2019-07-26 20:16:10
 */
namespace Alipay\Request;

class KoubeiSalesLeadsShopleadsCreateRequest extends AbstractAlipayRequest
{
	/** 
	 * 口碑开店Leads创建接口
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
