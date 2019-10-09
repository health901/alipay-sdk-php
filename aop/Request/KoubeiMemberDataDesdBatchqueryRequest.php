<?php
/**
 * ALIPAY API: koubei.member.data.desd.batchquery request
 *
 * @author auto create
 * @since 1.0, 2019-04-12 13:55:01
 */
class KoubeiMemberDataDesdBatchqueryRequest
{
	/** 
	 * bizcontet同步
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
