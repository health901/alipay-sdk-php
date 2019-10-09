<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.return request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:11:30
 */
namespace Alipay\Request;

class ZhimaCreditContractBorrowReturnRequest extends AbstractAlipayRequest
{
	/** 
	 * 物品归还接口
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
