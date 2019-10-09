<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.agreement.use request
 *
 * @author auto create
 * @since 1.0, 2019-05-14 11:16:11
 */
class ZhimaCreditEpSceneAgreementUseRequest
{
	/** 
	 * 加入信用服务
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
