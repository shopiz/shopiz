<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.item.synchronize request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbItemSynchronizeRequest
{
	/** 
	 * 外部实体ID<br /> 支持的最大列表长度为：64
	 **/
	private $extEntityId;
	
	/** 
	 * 外部实体类型.存如下值
IC_ITEM   --表示IC商品
IC_SKU    --表示IC最小单位商品
若输入其他值，则按IC_ITEM处理
	 **/
	private $extEntityType;
	
	/** 
	 * 商品ID<br /> 支持的最大列表长度为：20
	 **/
	private $itemId;
	
	/** 
	 * 商品所有人淘宝nick<br /> 支持最大长度为：64<br /> 支持的最大列表长度为：64
	 **/
	private $userNick;
	
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

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["item_id"] = $itemId;
	}

	public function getItemId()
	{
		return $this->itemId;
	}

	public function setUserNick($userNick)
	{
		$this->userNick = $userNick;
		$this->apiParas["user_nick"] = $userNick;
	}

	public function getUserNick()
	{
		return $this->userNick;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.item.synchronize";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->extEntityId,"extEntityId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->extEntityType,"extEntityType");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->itemId,"itemId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->userNick,"userNick");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->userNick,64,"userNick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
