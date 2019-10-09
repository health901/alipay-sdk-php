<?php
/**
 * ALIPAY API: alipay.open.biz.create request
 *
 * @author auto create
 * @since 1.0, 2019-04-12 18:10:17
 */
class AlipayOpenBizCreateRequest
{
	/** 
	 * 2121
	 **/
	private $a;
	
	/** 
	 * 1
	 **/
	private $b;
	
	/** 
	 * 21
	 **/
	private $de;
	
	/** 
	 * 1
	 **/
	private $stringbuff;

	
	public function setA($a)
	{
		$this->a = $a;
		$this->apiParas["a"] = $a;
	}

	public function getA()
	{
		return $this->a;
	}

	public function setB($b)
	{
		$this->b = $b;
		$this->apiParas["b"] = $b;
	}

	public function getB()
	{
		return $this->b;
	}

	public function setDe($de)
	{
		$this->de = $de;
		$this->apiParas["de"] = $de;
	}

	public function getDe()
	{
		return $this->de;
	}

	public function setStringbuff($stringbuff)
	{
		$this->stringbuff = $stringbuff;
		$this->apiParas["stringbuff"] = $stringbuff;
	}

	public function getStringbuff()
	{
		return $this->stringbuff;
	}

	public function getApiMethodName()
	{
		return "alipay.open.biz.create";
	}


}
