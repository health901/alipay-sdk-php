<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.userbalance.online request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:40:04
 */
class AlipayDataDataserviceAdUserbalanceOnlineRequest
{
	/** 
	 * 投放账户余额上线
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
