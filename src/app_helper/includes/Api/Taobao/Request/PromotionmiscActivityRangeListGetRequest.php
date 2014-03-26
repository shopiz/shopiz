<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotionmisc.activity.range.list.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionmiscActivityRangeListGetRequest
{
	/** 
	 * 活动id<br /> 支持最小值为：0
	 **/
	private $activityId;
	
	private $apiParas = array();
	
	public function setActivityId($activityId)
	{
		$this->activityId = $activityId;
		$this->apiParas["activity_id"] = $activityId;
	}

	public function getActivityId()
	{
		return $this->activityId;
	}

	public function getApiMethodName()
	{
		return "taobao.promotionmisc.activity.range.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->activityId,"activityId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->activityId,0,"activityId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
