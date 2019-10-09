<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.fulfillmentlist.sync request
 *
 * @author auto create
 * @since 1.0, 2019-05-22 14:55:01
 */
namespace Alipay\Request;

class ZhimaCreditEpSceneFulfillmentlistSyncRequest extends AbstractAlipayRequest
{
	/** 
	 * 信用服务履约同步(批量)
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
