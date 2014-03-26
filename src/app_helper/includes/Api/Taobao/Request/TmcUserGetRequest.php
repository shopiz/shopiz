<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.tmc.user.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TmcUserGetRequest
{
	/** 
	 * 需返回的字段列表，多个字段以半角逗号分隔。可选值：TmcUser结构体中的所有字段，一定要返回topic。
	 **/
	private $fields;
	
	/** 
	 * 用户昵称<br /> 支持最大长度为：100<br /> 支持的最大列表长度为：100
	 **/
	private $nick;
	
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
		return "taobao.tmc.user.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->fields,"fields");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->nick,"nick");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->nick,100,"nick");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
