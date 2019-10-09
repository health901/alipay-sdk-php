<?php
/**
 * ALIPAY API: alipay.eco.mycar.parking.chargeinfo.sync request
 *
 * @author auto create
 * @since 1.0, 2019-08-29 11:18:10
 */
namespace Alipay\Request;

class AlipayEcoMycarParkingChargeinfoSyncRequest extends AbstractAlipayRequest
{
	/** 
	 * 停车场价格信息同步
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
