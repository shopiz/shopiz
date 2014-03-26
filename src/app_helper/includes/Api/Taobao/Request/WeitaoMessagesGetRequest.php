<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.messages.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoMessagesGetRequest
{
	/** 
	 * 当前页<br /> 支持最小值为：0
	 **/
	private $currentPage;
	
	/** 
	 * 每页大小<br /> 支持最大值为：200<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setCurrentPage($currentPage)
	{
		$this->currentPage = $currentPage;
		$this->apiParas["current_page"] = $currentPage;
	}

	public function getCurrentPage()
	{
		return $this->currentPage;
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
		return "taobao.weitao.messages.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->currentPage,"currentPage");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->currentPage,0,"currentPage");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->pageSize,200,"pageSize");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->pageSize,1,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
