<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ump.mbbs.list.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class UmpMbbsListGetRequest
{
	/** 
	 * 营销积木块id组成的字符串。
	 **/
	private $ids;
	
	private $apiParas = array();
	
	public function setIds($ids)
	{
		$this->ids = $ids;
		$this->apiParas["ids"] = $ids;
	}

	public function getIds()
	{
		return $this->ids;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.mbbs.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->ids,"ids");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->ids,20,"ids");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
