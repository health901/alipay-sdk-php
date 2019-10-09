<?php
/**
 * ALIPAY API: alipay.open.mini.data.visit.query request
 *
 * @author auto create
 * @since 1.0, 2019-06-12 12:04:36
 */
namespace Alipay\Request;

class AlipayOpenMiniDataVisitQueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 小程序当日访问数据查询
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
