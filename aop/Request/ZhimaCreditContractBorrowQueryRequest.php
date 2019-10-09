<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.query request
 *
 * @author auto create
 * @since 1.0, 2019-08-19 16:06:45
 */
namespace Alipay\Request;

class ZhimaCreditContractBorrowQueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 借还合约查询
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
