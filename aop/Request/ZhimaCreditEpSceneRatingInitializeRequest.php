<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.rating.initialize request
 *
 * @author auto create
 * @since 1.0, 2019-05-14 11:25:01
 */
namespace Alipay\Request;

class ZhimaCreditEpSceneRatingInitializeRequest extends AbstractAlipayRequest
{
	/** 
	 * 芝麻企业信用客户信用评估初始化
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
