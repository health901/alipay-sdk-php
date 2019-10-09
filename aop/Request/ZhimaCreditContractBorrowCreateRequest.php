<?php
/**
 * ALIPAY API: zhima.credit.contract.borrow.create request
 *
 * @author auto create
 * @since 1.0, 2019-07-31 14:11:43
 */
namespace Alipay\Request;

class ZhimaCreditContractBorrowCreateRequest extends AbstractAlipayRequest
{
	/** 
	 * 创建借还记录
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
