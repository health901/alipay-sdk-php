<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.creative.batchquery request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 22:10:01
 */
class AlipayDataDataserviceAdCreativeBatchqueryRequest
{
	/** 
	 * 查询创意列表
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
