<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.hotel.order.face.deal request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class HotelOrderFaceDealRequest
{
	/** 
	 * 酒店订单oid
	 **/
	private $oid;
	
	/** 
	 * 操作类型，1：确认预订，2：取消订单<br /> 支持最大长度为：1<br /> 支持的最大列表长度为：1
	 **/
	private $operType;
	
	/** 
	 * 取消订单时的取消原因备注信息<br /> 支持最大长度为：500<br /> 支持的最大列表长度为：500
	 **/
	private $reasonText;
	
	/** 
	 * 取消订单时的取消原因，可选值：1,2,3,4；
1：无房，2：价格变动，3：买家原因，4：其它原因<br /> 支持最大长度为：1<br /> 支持的最大列表长度为：1
	 **/
	private $reasonType;
	
	private $apiParas = array();
	
	public function setOid($oid)
	{
		$this->oid = $oid;
		$this->apiParas["oid"] = $oid;
	}

	public function getOid()
	{
		return $this->oid;
	}

	public function setOperType($operType)
	{
		$this->operType = $operType;
		$this->apiParas["oper_type"] = $operType;
	}

	public function getOperType()
	{
		return $this->operType;
	}

	public function setReasonText($reasonText)
	{
		$this->reasonText = $reasonText;
		$this->apiParas["reason_text"] = $reasonText;
	}

	public function getReasonText()
	{
		return $this->reasonText;
	}

	public function setReasonType($reasonType)
	{
		$this->reasonType = $reasonType;
		$this->apiParas["reason_type"] = $reasonType;
	}

	public function getReasonType()
	{
		return $this->reasonType;
	}

	public function getApiMethodName()
	{
		return "taobao.hotel.order.face.deal";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->oid,"oid");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->operType,"operType");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->operType,1,"operType");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->reasonText,500,"reasonText");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->reasonType,1,"reasonType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
