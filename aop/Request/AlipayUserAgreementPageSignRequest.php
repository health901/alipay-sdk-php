<?php
/**
 * ALIPAY API: alipay.user.agreement.page.sign request
 *
 * @author auto create
 * @since 1.0, 2019-09-03 17:50:55
 */
class AlipayUserAgreementPageSignRequest
{
	/** 
	 * 支付宝个人协议页面签约接口
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
