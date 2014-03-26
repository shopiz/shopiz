<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.item.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbItemDeleteRequest
{
	/** 
	 * 商品ID
	 **/
	private $itemId;
	
	/** 
	 * 商品所有人淘宝nick
	 **/
	private $userNick;
	
	private $apiParas = array();
	
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
		return "taobao.wlb.item.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->itemId,"itemId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->userNick,"userNick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
