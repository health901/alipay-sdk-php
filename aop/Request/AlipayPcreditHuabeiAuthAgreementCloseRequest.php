<?php
/**
 * ALIPAY API: alipay.pcredit.huabei.auth.agreement.close request
 *
 * @author auto create
 * @since 1.0, 2019-08-16 11:50:01
 */
class AlipayPcreditHuabeiAuthAgreementCloseRequest
{
	/** 
	 * 花呗先享会员协议关闭接口
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
