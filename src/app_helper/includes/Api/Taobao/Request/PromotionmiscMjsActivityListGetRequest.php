<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotionmisc.mjs.activity.list.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionmiscMjsActivityListGetRequest
{
	/** 
	 * 活动类型： 1表示商品级别的活动；2表示店铺级别的活动。<br /> 支持最大值为：2<br /> 支持最小值为：1<br /> 支持的最大列表长度为：1
	 **/
	private $activityType;
	
	/** 
	 * 页码。<br /> 支持最小值为：1
	 **/
	private $pageNo;
	
	/** 
	 * 每页记录数，最大支持50 。<br /> 支持最小值为：1
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setActivityType($activityType)
	{
		$this->activityType = $activityType;
		$this->apiParas["activity_type"] = $activityType;
	}

	public function getActivityType()
	{
		return $this->activityType;
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
		return "taobao.promotionmisc.mjs.activity.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->activityType,"activityType");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->activityType,2,"activityType");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->activityType,1,"activityType");
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