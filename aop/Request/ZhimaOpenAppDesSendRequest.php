<?php
/**
 * ALIPAY API: zhima.open.app.des.send request
 *
 * @author auto create
 * @since 1.0, 2019-06-05 22:19:55
 */
namespace Alipay\Request;

class ZhimaOpenAppDesSendRequest extends AbstractAlipayRequest
{
	/** 
	 * tomayi消息测试
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
