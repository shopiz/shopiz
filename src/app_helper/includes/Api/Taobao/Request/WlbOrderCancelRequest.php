<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.order.cancel request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbOrderCancelRequest
{
	/** 
	 * 物流宝订单编号
	 **/
	private $wlbOrderCode;
	
	private $apiParas = array();
	
	public function setWlbOrderCode($wlbOrderCode)
	{
		$this->wlbOrderCode = $wlbOrderCode;
		$this->apiParas["wlb_order_code"] = $wlbOrderCode;
	}

	public function getWlbOrderCode()
	{
		return $this->wlbOrderCode;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.order.cancel";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->wlbOrderCode,"wlbOrderCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
