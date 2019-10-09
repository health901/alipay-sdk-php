<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.delay request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:11:16
 */
class ZhimaCreditContractBorrowDelayRequest
{
	/** 
	 * 借还合约延期接口
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
