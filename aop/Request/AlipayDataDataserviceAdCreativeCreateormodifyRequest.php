<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.creative.createormodify request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:41:57
 */
class AlipayDataDataserviceAdCreativeCreateormodifyRequest
{
	/** 
	 * 新增或修改创意
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
