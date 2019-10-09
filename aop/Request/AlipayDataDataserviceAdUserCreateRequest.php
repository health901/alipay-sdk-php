<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.user.create request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:39:52
 */
class AlipayDataDataserviceAdUserCreateRequest
{
	/** 
	 * 投放账户开户
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
