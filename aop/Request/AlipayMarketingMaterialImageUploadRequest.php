<?php
/**
 * ALIPAY API: alipay.marketing.material.image.upload request
 *
 * @author auto create
 * @since 1.0, 2019-07-15 10:09:02
 */
class AlipayMarketingMaterialImageUploadRequest
{
	/** 
	 * 图片的byte字节数组。图片大小限制为2M
	 **/
	private $fileContent;

	
	public function setFileContent($fileContent)
	{
		$this->fileContent = $fileContent;
		$this->apiParas["file_content"] = $fileContent;
	}

	public function getFileContent()
	{
		return $this->fileContent;
	}
}
