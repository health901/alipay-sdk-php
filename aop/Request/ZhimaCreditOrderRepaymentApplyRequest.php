<?php
/**
 * ALIPAY API: zhima.credit.order.repayment.apply request
 *
 * @author auto create
 * @since 1.0, 2019-05-30 15:40:01
 */
class ZhimaCreditOrderRepaymentApplyRequest
{
	/** 
	 * 信用订单追赔操作申请接口
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
