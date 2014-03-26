<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.skus.custom.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SkusCustomGetRequest
{
	/** 
	 * 需返回的字段列表。可选值：Sku结构体中的所有字段；字段之间用“,”隔开
	 **/
	private $fields;
	
	/** 
	 * Sku的外部商家ID
	 **/
	private $outerId;
	
	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setOuterId($outerId)
	{
		$this->outerId = $outerId;
		$this->apiParas["outer_id"] = $outerId;
	}

	public function getOuterId()
	{
		return $this->outerId;
	}

	public function getApiMethodName()
	{
		return "taobao.skus.custom.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->fields,"fields");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->outerId,"outerId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
