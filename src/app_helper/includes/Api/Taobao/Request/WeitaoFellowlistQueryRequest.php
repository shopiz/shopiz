<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.fellowlist.query request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoFellowlistQueryRequest
{
	/** 
	 * 下一页的起始id
	 **/
	private $fromId;
	
	/** 
	 * 一页大小,最大100<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setFromId($fromId)
	{
		$this->fromId = $fromId;
		$this->apiParas["from_id"] = $fromId;
	}

	public function getFromId()
	{
		return $this->fromId;
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
		return "taobao.weitao.fellowlist.query";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageSize,1,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
