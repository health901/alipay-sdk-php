<?php
/**
 * ALIPAY API: alipay.user.agreement.unsign request
 *
 * @author auto create
 * @since 1.0, 2019-09-03 17:50:49
 */
namespace Alipay\Request;

class AlipayUserAgreementUnsignRequest extends AbstractAlipayRequest
{
	/** 
	 * 支付宝个人代扣协议解约接口
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
