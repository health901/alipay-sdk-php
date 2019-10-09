<?php
/**
 * ALIPAY API: alipay.fund.trans.common.query request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 15:48:52
 */
namespace Alipay\Request;

class AlipayFundTransCommonQueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 转账业务单据查询接口
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
