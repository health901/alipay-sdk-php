<?php
/**
 * ALIPAY API: alipay.open.app.alipaycert.download request
 *
 * @author auto create
 * @since 1.0, 2019-08-20 18:15:01
 */
class AlipayOpenAppAlipaycertDownloadRequest
{
	/** 
	 * 应用支付宝公钥证书下载
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
