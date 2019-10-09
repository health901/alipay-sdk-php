<?php
/**
 * ALIPAY API: alipay.merchant.item.file.upload request
 *
 * @author auto create
 * @since 1.0, 2019-09-09 14:51:23
 */
namespace Alipay\Request;

class AlipayMerchantItemFileUploadRequest extends AbstractAlipayRequest
{
	/** 
	 * 文件二进制字节流，最大为4M
	 **/
	private $fileContent;
	
	/** 
	 * 业务场景描述，比如订单信息同步场景对应SYNC_ORDER
	 **/
	private $scene;

	
	public function setFileContent($fileContent)
	{
		$this->fileContent = $fileContent;
		$this->apiParas["file_content"] = $fileContent;
	}

	public function getFileContent()
	{
		return $this->fileContent;
	}

	public function setScene($scene)
	{
		$this->scene = $scene;
		$this->apiParas["scene"] = $scene;
	}

	public function getScene()
	{
		return $this->scene;
	}


}
