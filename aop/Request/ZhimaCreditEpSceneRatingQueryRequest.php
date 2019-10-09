<?php
/**
 * ALIPAY API: zhima.credit.ep.scene.rating.query request
 *
 * @author auto create
 * @since 1.0, 2019-05-14 11:15:01
 */
class ZhimaCreditEpSceneRatingQueryRequest
{
	/** 
	 * 芝麻企业信用评估订单查询
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
