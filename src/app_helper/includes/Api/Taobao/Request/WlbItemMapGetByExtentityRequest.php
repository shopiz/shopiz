<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.item.map.get.by.extentity request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbItemMapGetByExtentityRequest
{
	/** 
	 * 外部实体类型对应的商品id
	 **/
	private $extEntityId;
	
	/** 
	 * 外部实体类型： IC_ITEM--ic商品 IC_SKU--ic销售单元
	 **/
	private $extEntityType;
	
	private $apiParas = array();
	
	public function setExtEntityId($extEntityId)
	{
		$this->extEntityId = $extEntityId;
		$this->apiParas["ext_entity_id"] = $extEntityId;
	}

	public function getExtEntityId()
	{
		return $this->extEntityId;
	}

	public function setExtEntityType($extEntityType)
	{
		$this->extEntityType = $extEntityType;
		$this->apiParas["ext_entity_type"] = $extEntityType;
	}

	public function getExtEntityType()
	{
		return $this->extEntityType;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.item.map.get.by.extentity";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->extEntityId,"extEntityId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->extEntityType,"extEntityType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
