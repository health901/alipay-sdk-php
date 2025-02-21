<?php
/**
 * ALIPAY API: alipay.trade.royalty.relation.unbind request
 *
 * @author auto create
 * @since 1.0, 2019-07-05 19:45:01
 */
namespace Alipay\Request;

class AlipayTradeRoyaltyRelationUnbindRequest extends AbstractAlipayRequest
{
	/** 
	 * 分账关系解绑
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
