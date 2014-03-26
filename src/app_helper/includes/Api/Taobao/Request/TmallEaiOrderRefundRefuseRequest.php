<?php

namespace Api\Taobao\Request;
/**
 * TOP API: tmall.eai.order.refund.refuse request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TmallEaiOrderRefundRefuseRequest
{
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
	 * 拒绝退款原因留言
	 **/
	private $refuseMessage;
	
	/** 
	 * 拒绝退款举证上传
	 **/
	private $refuseProof;
	
	private $apiParas = array();
	
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

	public function setRefuseMessage($refuseMessage)
	{
		$this->refuseMessage = $refuseMessage;
		$this->apiParas["refuse_message"] = $refuseMessage;
	}

	public function getRefuseMessage()
	{
		return $this->refuseMessage;
	}

	public function setRefuseProof($refuseProof)
	{
		$this->refuseProof = $refuseProof;
		$this->apiParas["refuse_proof"] = $refuseProof;
	}

	public function getRefuseProof()
	{
		return $this->refuseProof;
	}

	public function getApiMethodName()
	{
		return "tmall.eai.order.refund.refuse";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundId,"refundId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundPhase,"refundPhase");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refundVersion,"refundVersion");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refuseMessage,"refuseMessage");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->refuseProof,"refuseProof");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
