<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotion.coupon.transfer request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionCouponTransferRequest
{
	/** 
	 * 优惠券编号<br /> 支持最小值为：1
	 **/
	private $couponNumber;
	
	/** 
	 * 要赠送的淘宝昵称
	 **/
	private $receiveingBuyerName;
	
	private $apiParas = array();
	
	public function setCouponNumber($couponNumber)
	{
		$this->couponNumber = $couponNumber;
		$this->apiParas["coupon_number"] = $couponNumber;
	}

	public function getCouponNumber()
	{
		return $this->couponNumber;
	}

	public function setReceiveingBuyerName($receiveingBuyerName)
	{
		$this->receiveingBuyerName = $receiveingBuyerName;
		$this->apiParas["receiveing_buyer_name"] = $receiveingBuyerName;
	}

	public function getReceiveingBuyerName()
	{
		return $this->receiveingBuyerName;
	}

	public function getApiMethodName()
	{
		return "taobao.promotion.coupon.transfer";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->couponNumber,"couponNumber");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->couponNumber,1,"couponNumber");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->receiveingBuyerName,"receiveingBuyerName");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
