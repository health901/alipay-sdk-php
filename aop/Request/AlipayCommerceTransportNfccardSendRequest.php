<?php
/**
 * ALIPAY API: alipay.commerce.transport.nfccard.send request
 *
 * @author auto create
 * @since 1.0, 2019-08-07 18:20:01
 */
class AlipayCommerceTransportNfccardSendRequest
{
	/** 
	 * NFC用户卡信息同步
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
