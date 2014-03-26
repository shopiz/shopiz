<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.sellercenter.user.permissions.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class SellercenterUserPermissionsGetRequest
{
	/** 
	 * 用户标识，次入参必须为子账号比如zhangsan:cool。如果只输入主账号zhangsan，将报错。
	 **/
	private $nick;
	
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

	public function getApiMethodName()
	{
		return "taobao.sellercenter.user.permissions.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->nick,"nick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
