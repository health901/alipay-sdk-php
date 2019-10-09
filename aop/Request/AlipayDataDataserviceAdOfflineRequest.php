<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.offline request
 *
 * @author auto create
 * @since 1.0, 2019-05-17 10:30:01
 */
namespace Alipay\Request;

class AlipayDataDataserviceAdOfflineRequest extends AbstractAlipayRequest
{
	/** 
	 * 广告暂停API
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
