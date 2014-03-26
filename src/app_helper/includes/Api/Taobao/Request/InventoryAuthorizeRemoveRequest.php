<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.inventory.authorize.remove request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class InventoryAuthorizeRemoveRequest
{
	/** 
	 * 库存授权结果码
	 **/
	private $authorizeCode;
	
	/** 
	 * 后端商品id
	 **/
	private $scItemId;
	
	/** 
	 * 移除授权的目标用户昵称列表，用”,”隔开
	 **/
	private $userNickList;
	
	private $apiParas = array();
	
	public function setAuthorizeCode($authorizeCode)
	{
		$this->authorizeCode = $authorizeCode;
		$this->apiParas["authorize_code"] = $authorizeCode;
	}

	public function getAuthorizeCode()
	{
		return $this->authorizeCode;
	}

	public function setScItemId($scItemId)
	{
		$this->scItemId = $scItemId;
		$this->apiParas["sc_item_id"] = $scItemId;
	}

	public function getScItemId()
	{
		return $this->scItemId;
	}

	public function setUserNickList($userNickList)
	{
		$this->userNickList = $userNickList;
		$this->apiParas["user_nick_list"] = $userNickList;
	}

	public function getUserNickList()
	{
		return $this->userNickList;
	}

	public function getApiMethodName()
	{
		return "taobao.inventory.authorize.remove";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->authorizeCode,"authorizeCode");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->scItemId,"scItemId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->userNickList,"userNickList");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
