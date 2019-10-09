<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.agreement.cancel request
 *
 * @author auto create
 * @since 1.0, 2019-05-14 11:23:04
 */
namespace Alipay\Request;

class ZhimaCreditEpSceneAgreementCancelRequest extends AbstractAlipayRequest
{
	/** 
	 * 取消信用服务
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
