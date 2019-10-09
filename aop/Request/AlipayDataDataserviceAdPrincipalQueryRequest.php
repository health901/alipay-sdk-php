<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.principal.query request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 22:00:01
 */
class AlipayDataDataserviceAdPrincipalQueryRequest
{
	/** 
	 * 查询商家信息
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
