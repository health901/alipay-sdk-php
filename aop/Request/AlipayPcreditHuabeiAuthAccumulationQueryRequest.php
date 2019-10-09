<?php
/**
 * ALIPAY API: alipay.pcredit.huabei.auth.accumulation.query request
 *
 * @author auto create
 * @since 1.0, 2019-09-03 19:17:50
 */
class AlipayPcreditHuabeiAuthAccumulationQueryRequest
{
	/** 
	 * 账单周期数据查询
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
