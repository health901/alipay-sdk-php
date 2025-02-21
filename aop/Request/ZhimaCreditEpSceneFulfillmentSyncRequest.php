<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.fulfillment.sync request
 *
 * @author auto create
 * @since 1.0, 2019-05-14 11:16:02
 */
namespace Alipay\Request;

class ZhimaCreditEpSceneFulfillmentSyncRequest extends AbstractAlipayRequest
{
	/** 
	 * 信用服务履约同步
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
