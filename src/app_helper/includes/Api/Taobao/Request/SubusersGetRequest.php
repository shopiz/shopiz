<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.subusers.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class SubusersGetRequest
{
	/** 
	 * 主账号用户名
	 **/
	private $userNick;
	
	private $apiParas = array();
	
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
		return "taobao.subusers.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->userNick,"userNick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
