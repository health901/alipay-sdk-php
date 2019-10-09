<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.online request
 *
 * @author auto create
 * @since 1.0, 2019-05-15 16:45:01
 */
namespace Alipay\Request;

class AlipayDataDataserviceAdOnlineRequest extends AbstractAlipayRequest
{
	/** 
	 * 广告启用API
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
