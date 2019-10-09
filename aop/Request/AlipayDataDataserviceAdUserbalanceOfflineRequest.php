<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.userbalance.offline request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:30:01
 */
namespace Alipay\Request;

class AlipayDataDataserviceAdUserbalanceOfflineRequest extends AbstractAlipayRequest
{
	/** 
	 * 投放账户余额下线
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
