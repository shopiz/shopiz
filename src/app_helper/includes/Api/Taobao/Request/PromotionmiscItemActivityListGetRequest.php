<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotionmisc.item.activity.list.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionmiscItemActivityListGetRequest
{
	/** 
	 * 页码。<br /> 支持最小值为：1
	 **/
	private $pageNo;
	
	/** 
	 * 每页记录数，最大支持50 。<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
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
		return "taobao.promotionmisc.item.activity.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageNo,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageNo,1,"pageNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageSize,1,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
