<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotion.coupon.send request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionCouponSendRequest
{
	/** 
	 * 买家昵称用半角','号分割
	 **/
	private $buyerNick;
	
	/** 
	 * 优惠券的id
	 **/
	private $couponId;
	
	private $apiParas = array();
	
	public function setBuyerNick($buyerNick)
	{
		$this->buyerNick = $buyerNick;
		$this->apiParas["buyer_nick"] = $buyerNick;
	}

	public function getBuyerNick()
	{
		return $this->buyerNick;
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

	public function getApiMethodName()
	{
		return "taobao.promotion.coupon.send";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->buyerNick,"buyerNick");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->buyerNick,100,"buyerNick");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->couponId,"couponId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
