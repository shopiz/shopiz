<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotion.activity.add request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class PromotionActivityAddRequest
{
	/** 
	 * 优惠券总领用数量<br /> 支持最大值为：999999<br /> 支持最小值为：1
	 **/
	private $couponCount;
	
	/** 
	 * 优惠券的id，唯一标识这个优惠券
	 **/
	private $couponId;
	
	/** 
	 * 每个人最多领用数量，0代表不限<br /> 支持最大值为：5<br /> 支持最小值为：0
	 **/
	private $personLimitCount;
	
	/** 
	 * 是否将该活动优惠券同步到淘券市场
1（不同步）
2（同步）<br /> 支持最大值为：2<br /> 支持最小值为：1
	 **/
	private $uploadToTaoquan;
	
	private $apiParas = array();
	
	public function setCouponCount($couponCount)
	{
		$this->couponCount = $couponCount;
		$this->apiParas["coupon_count"] = $couponCount;
	}

	public function getCouponCount()
	{
		return $this->couponCount;
	}

	public function setCouponId($couponId)
	{
		$this->couponId = $couponId;
		$this->apiParas["coupon_id"] = $couponId;
	}

	public function getCouponId()
	{
		return $this->couponId;
	}

	public function setPersonLimitCount($personLimitCount)
	{
		$this->personLimitCount = $personLimitCount;
		$this->apiParas["person_limit_count"] = $personLimitCount;
	}

	public function getPersonLimitCount()
	{
		return $this->personLimitCount;
	}

	public function setUploadToTaoquan($uploadToTaoquan)
	{
		$this->uploadToTaoquan = $uploadToTaoquan;
		$this->apiParas["upload_to_taoquan"] = $uploadToTaoquan;
	}

	public function getUploadToTaoquan()
	{
		return $this->uploadToTaoquan;
	}

	public function getApiMethodName()
	{
		return "taobao.promotion.activity.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->couponCount,"couponCount");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->couponCount,999999,"couponCount");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->couponCount,1,"couponCount");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->couponId,"couponId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->personLimitCount,"personLimitCount");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->personLimitCount,5,"personLimitCount");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->personLimitCount,0,"personLimitCount");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->uploadToTaoquan,2,"uploadToTaoquan");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->uploadToTaoquan,1,"uploadToTaoquan");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
