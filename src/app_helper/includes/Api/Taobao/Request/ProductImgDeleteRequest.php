<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.product.img.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class ProductImgDeleteRequest
{
	/** 
	 * 非主图ID
	 **/
	private $id;
	
	/** 
	 * 产品ID.Product的id,通过taobao.product.add接口新增产品的时候会返回id.
	 **/
	private $productId;
	
	private $apiParas = array();
	
	public function setId($id)
	{
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function getApiMethodName()
	{
		return "taobao.product.img.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->id,"id");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->productId,"productId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
