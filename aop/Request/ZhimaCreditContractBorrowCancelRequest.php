<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.cancel request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:11:36
 */
class ZhimaCreditContractBorrowCancelRequest
{
	/** 
	 * 借还合约取消接口
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
