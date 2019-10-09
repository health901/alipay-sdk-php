<?php
/**
 * ALIPAY API: alipay.data.aiservice.sgx.gateway.query request
 *
 * @author auto create
 * @since 1.0, 2019-05-22 16:25:01
 */
class AlipayDataAiserviceSgxGatewayQueryRequest
{
	/** 
	 * 查询sgx集群的IAS report
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
