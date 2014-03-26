<?php

namespace Api\Taobao\Request;
/**
 * TOP API: tmall.eai.order.refund.good.return.agree request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TmallEaiOrderRefundGoodReturnAgreeRequest
{
	/** 
	 * 同意退货留言
	 **/
	private $message;
	
	/** 
	 * 退款单编号
	 **/
	private $refundId;
	
	/** 
	 * 售中：onsale
售后：aftersale
	 **/
	private $refundPhase;
	
	/** 
	 * 退款版本号
	 **/
	private $refundVersion;
	
	/** 
	 * 卖家收货地址编号
	 **/
	private $sellerLogisticsAddressId;
	
	private $apiParas = array();
	
	public function setMessage($message)
	{
		$this->message = $message;
		$this->apiParas["message"] = $message;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function setRefundId($refundId)
	{
		$this->refundId = $refundId;
		$this->apiParas["refund_id"] = $refundId;
	}

	public function getRefundId()
	{
		return $this->refundId;
	}

	public function setRefundPhase($refundPhase)
	{
		$this->refundPhase = $refundPhase;
		$this->apiParas["refund_phase"] = $refundPhase;
	}

	public function getRefundPhase()
	{
		return $this->refundPhase;
	}

	public function setRefundVersion($refundVersion)
	{
		$this->refundVersion = $refundVersion;
		$this->apiParas["refund_version"] = $refundVersion;
	}

	public function getRefundVersion()
	{
		return $this->refundVersion;
	}

	public function setSellerLogisticsAddressId($sellerLogisticsAddressId)
	{
		$this->sellerLogisticsAddressId = $sellerLogisticsAddressId;
		$this->apiParas["seller_logistics_address_id"] = $sellerLogisticsAddressId;
	}

	public function getSellerLogisticsAddressId()
	{
		return $this->sellerLogisticsAddressId;
	}

	public function getApiMethodName()
	{
		return "tmall.eai.order.refund.good.return.agree";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->message,"message");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundId,"refundId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundPhase,"refundPhase");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundVersion,"refundVersion");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->sellerLogisticsAddressId,"sellerLogisticsAddressId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
