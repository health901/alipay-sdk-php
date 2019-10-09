<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.principal.createormodify request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:39:32
 */
class AlipayDataDataserviceAdPrincipalCreateormodifyRequest
{
	/** 
	 * 新增/修改商家
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
