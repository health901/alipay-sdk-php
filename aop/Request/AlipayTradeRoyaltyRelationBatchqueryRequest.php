<?php
/**
 * ALIPAY API: alipay.trade.royalty.relation.batchquery request
 *
 * @author auto create
 * @since 1.0, 2019-07-15 11:15:03
 */
namespace Alipay\Request;

class AlipayTradeRoyaltyRelationBatchqueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 分账关系查询
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
