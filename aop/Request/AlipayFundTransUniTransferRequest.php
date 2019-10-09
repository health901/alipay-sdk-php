<?php
/**
 * ALIPAY API: alipay.fund.trans.uni.transfer request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 16:06:09
 */
namespace Alipay\Request;

class AlipayFundTransUniTransferRequest extends AbstractAlipayRequest
{
	/** 
	 * 支付宝转账支付接口
	 **/
	private $bizContent;

	
	public function setBizContent($bizContent)
	{
		$this->bizContent = $bizContent;
		$this->apiParams["biz_content"] = $bizContent;
	}

	public function getBizContent()
	{
		return $this->bizContent;
	}


}
