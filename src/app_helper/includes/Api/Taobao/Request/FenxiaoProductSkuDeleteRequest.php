<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.fenxiao.product.sku.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class FenxiaoProductSkuDeleteRequest
{
	/** 
	 * 产品id
	 **/
	private $productId;
	
	/** 
	 * sku属性
	 **/
	private $properties;
	
	private $apiParas = array();
	
	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function setProperties($properties)
	{
		$this->properties = $properties;
		$this->apiParas["properties"] = $properties;
	}

	public function getProperties()
	{
		return $this->properties;
	}

	public function getApiMethodName()
	{
		return "taobao.fenxiao.product.sku.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->productId,"productId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->properties,"properties");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
