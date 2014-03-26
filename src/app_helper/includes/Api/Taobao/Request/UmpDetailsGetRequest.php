<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ump.details.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class UmpDetailsGetRequest
{
	/** 
	 * 营销活动id
	 **/
	private $actId;
	
	/** 
	 * 分页的页码<br /> 支持最小值为：0
	 **/
	private $pageNo;
	
	/** 
	 * 每页的最大条数<br /> 支持最大值为：50<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setActId($actId)
	{
		$this->actId = $actId;
		$this->apiParas["act_id"] = $actId;
	}

	public function getActId()
	{
		return $this->actId;
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
		return "taobao.ump.details.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->actId,"actId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageNo,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageNo,0,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->pageSize,50,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageSize,1,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
