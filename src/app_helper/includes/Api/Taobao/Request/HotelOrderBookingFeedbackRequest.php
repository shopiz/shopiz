<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.hotel.order.booking.feedback request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class HotelOrderBookingFeedbackRequest
{
	/** 
	 * 失败原因,当result为failed时,此项为必填，最长200个字符
	 **/
	private $failedReason;
	
	/** 
	 * 指令消息中的messageid,最长128字符
	 **/
	private $messageId;
	
	/** 
	 * 酒店订单id<br /> 支持最小值为：0
	 **/
	private $oid;
	
	/** 
	 * 合作方订单号,最长250个字符
	 **/
	private $outOid;
	
	/** 
	 * 在合作方退订时可能要用到的标识码，最长250个字符
	 **/
	private $refundCode;
	
	/** 
	 * 预订结果 
S:成功
F:失败
	 **/
	private $result;
	
	/** 
	 * 指令消息中的session_id<br /> 支持最小值为：0
	 **/
	private $sessionId;
	
	private $apiParas = array();
	
	public function setFailedReason($failedReason)
	{
		$this->failedReason = $failedReason;
		$this->apiParas["failed_reason"] = $failedReason;
	}

	public function getFailedReason()
	{
		return $this->failedReason;
	}

	public function setMessageId($messageId)
	{
		$this->messageId = $messageId;
		$this->apiParas["message_id"] = $messageId;
	}

	public function getMessageId()
	{
		return $this->messageId;
	}

	public function setOid($oid)
	{
		$this->oid = $oid;
		$this->apiParas["oid"] = $oid;
	}

	public function getOid()
	{
		return $this->oid;
	}

	public function setOutOid($outOid)
	{
		$this->outOid = $outOid;
		$this->apiParas["out_oid"] = $outOid;
	}

	public function getOutOid()
	{
		return $this->outOid;
	}

	public function setRefundCode($refundCode)
	{
		$this->refundCode = $refundCode;
		$this->apiParas["refund_code"] = $refundCode;
	}

	public function getRefundCode()
	{
		return $this->refundCode;
	}

	public function setResult($result)
	{
		$this->result = $result;
		$this->apiParas["result"] = $result;
	}

	public function getResult()
	{
		return $this->result;
	}

	public function setSessionId($sessionId)
	{
		$this->sessionId = $sessionId;
		$this->apiParas["session_id"] = $sessionId;
	}

	public function getSessionId()
	{
		return $this->sessionId;
	}

	public function getApiMethodName()
	{
		return "taobao.hotel.order.booking.feedback";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->messageId,"messageId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->oid,0,"oid");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->outOid,"outOid");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->result,"result");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->sessionId,"sessionId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->sessionId,0,"sessionId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
