<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.orderschedulerule.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbOrderscheduleruleDeleteRequest
{
	/** 
	 * 订单调度规则ID<br /> 支持的最大列表长度为：20
	 **/
	private $id;
	
	/** 
	 * 商品userNick<br /> 支持最大长度为：64<br /> 支持的最大列表长度为：64
	 **/
	private $userNick;
	
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
		return "taobao.wlb.orderschedulerule.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->id,"id");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->userNick,"userNick");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->userNick,64,"userNick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
