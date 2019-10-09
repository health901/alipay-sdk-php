<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.creative.query request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:42:16
 */
class AlipayDataDataserviceAdCreativeQueryRequest
{
	/** 
	 * 查询创意详情
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
