<?php
/**
 * ALIPAY API: alipay.trade.advance.consult request
 *
 * @author auto create
 * @since 1.0, 2019-06-25 12:11:45
 */
class AlipayTradeAdvanceConsultRequest
{
	/** 
	 * 垫资查询
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
