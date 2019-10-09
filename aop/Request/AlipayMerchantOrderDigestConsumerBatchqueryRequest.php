<?php
/**
 * ALIPAY API: alipay.merchant.order.digest.consumer.batchquery request
 *
 * @author auto create
 * @since 1.0, 2019-08-19 15:10:01
 */
namespace Alipay\Request;

class AlipayMerchantOrderDigestConsumerBatchqueryRequest extends AbstractAlipayRequest
{
	/** 
	 * 订单数据列表查询
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
