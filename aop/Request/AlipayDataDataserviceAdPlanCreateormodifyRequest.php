<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.plan.createormodify request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:39:59
 */
namespace Alipay\Request;

class AlipayDataDataserviceAdPlanCreateormodifyRequest extends AbstractAlipayRequest
{
	/** 
	 * 创建/修改计划
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
