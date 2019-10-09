<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.initialize request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:15:01
 */
class ZhimaCreditContractBorrowInitializeRequest
{
	/** 
	 * 借还合约初始化
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
