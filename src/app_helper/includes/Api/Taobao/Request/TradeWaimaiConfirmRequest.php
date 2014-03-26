<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.trade.waimai.confirm request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TradeWaimaiConfirmRequest
{
	/** 
	 * 未确认发货的订单编号
	 **/
	private $orderId;
	
	private $apiParas = array();
	
	public function setOrderId($orderId)
	{
		$this->orderId = $orderId;
		$this->apiParas["order_id"] = $orderId;
	}

	public function getOrderId()
	{
		return $this->orderId;
	}

	public function getApiMethodName()
	{
		return "taobao.trade.waimai.confirm";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->orderId,"orderId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
