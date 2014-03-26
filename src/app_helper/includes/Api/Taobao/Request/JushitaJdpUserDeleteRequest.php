<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.jushita.jdp.user.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class JushitaJdpUserDeleteRequest
{
	/** 
	 * 要删除用户的昵称
	 **/
	private $nick;
	
	/** 
	 * 需要删除的用户编号<br /> 支持最小值为：1
	 **/
	private $userId;
	
	private $apiParas = array();
	
	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "taobao.jushita.jdp.user.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->userId,1,"userId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
