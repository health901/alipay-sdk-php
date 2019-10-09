<?php
/**
 * ALIPAY API: alipay.data.dataservice.ad.group.createormodify request
 *
 * @author auto create
 * @since 1.0, 2019-07-30 21:45:01
 */
namespace Alipay\Request;

class AlipayDataDataserviceAdGroupCreateormodifyRequest extends AbstractAlipayRequest
{
	/** 
	 * 创建/修改单元
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
