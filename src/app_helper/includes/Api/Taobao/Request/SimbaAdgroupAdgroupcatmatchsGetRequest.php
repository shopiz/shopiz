<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.adgroup.adgroupcatmatchs.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaAdgroupAdgroupcatmatchsGetRequest
{
	/** 
	 * 推广组Id列表
	 **/
	private $adgroupIds;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setAdgroupIds($adgroupIds)
	{
		$this->adgroupIds = $adgroupIds;
		$this->apiParas["adgroup_ids"] = $adgroupIds;
	}

	public function getAdgroupIds()
	{
		return $this->adgroupIds;
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
		return "taobao.simba.adgroup.adgroupcatmatchs.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->adgroupIds,"adgroupIds");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->adgroupIds,200,"adgroupIds");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
