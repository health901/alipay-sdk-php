<?php
/**
 * ALIPAY API: zhima.credit.contract.principal.query request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:11:56
 */
class ZhimaCreditContractPrincipalQueryRequest
{
	/** 
	 * 身份主体查询接口
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
