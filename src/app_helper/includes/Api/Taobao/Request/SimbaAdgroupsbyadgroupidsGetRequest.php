<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.adgroupsbyadgroupids.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaAdgroupsbyadgroupidsGetRequest
{
	/** 
	 * 推广组Id列表
	 **/
	private $adgroupIds;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	/** 
	 * 页码，从1开始<br /> 支持最小值为：1
	 **/
	private $pageNo;
	
	/** 
	 * 页尺寸，最大200，如果入参adgroup_ids有传入值，则page_size和page_no值不起作用。如果adgrpup_ids为空而campaign_id有值，此时page_size和page_no值才是返回的页数据大小和页码<br /> 支持最大值为：200<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
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

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["page_no"] = $pageNo;
	}

	public function getPageNo()
	{
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.adgroupsbyadgroupids.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->adgroupIds,200,"adgroupIds");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageNo,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageNo,1,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->pageSize,200,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageSize,1,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
