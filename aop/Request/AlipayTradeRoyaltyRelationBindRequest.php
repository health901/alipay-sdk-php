<?php
/**
 * ALIPAY API: alipay.trade.royalty.relation.bind request
 *
 * @author auto create
 * @since 1.0, 2019-07-05 19:40:01
 */
class AlipayTradeRoyaltyRelationBindRequest
{
	/** 
	 * 分账关系绑定
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
