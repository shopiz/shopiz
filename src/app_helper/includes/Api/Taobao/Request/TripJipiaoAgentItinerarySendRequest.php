<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.trip.jipiao.agent.itinerary.send request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class TripJipiaoAgentItinerarySendRequest
{
	/** 
	 * 物流公司代码CODE，如不清楚，请找运营提供<br /> 支持最大长度为：20<br /> 支持的最大列表长度为：20
	 **/
	private $companyCode;
	
	/** 
	 * 邮寄单号，长度不能超过32字节<br /> 支持最大长度为：32<br /> 支持的最大列表长度为：32
	 **/
	private $expressCode;
	
	/** 
	 * 淘宝系统行程单唯一键
	 **/
	private $itineraryId;
	
	/** 
	 * 行程单号<br /> 支持最大长度为：32<br /> 支持的最大列表长度为：32
	 **/
	private $itineraryNo;
	
	/** 
	 * 邮寄日期，格式yyyy-mm-dd
	 **/
	private $sendDate;
	
	private $apiParas = array();
	
	public function setCompanyCode($companyCode)
	{
		$this->companyCode = $companyCode;
		$this->apiParas["company_code"] = $companyCode;
	}

	public function getCompanyCode()
	{
		return $this->companyCode;
	}

	public function setExpressCode($expressCode)
	{
		$this->expressCode = $expressCode;
		$this->apiParas["express_code"] = $expressCode;
	}

	public function getExpressCode()
	{
		return $this->expressCode;
	}

	public function setItineraryId($itineraryId)
	{
		$this->itineraryId = $itineraryId;
		$this->apiParas["itinerary_id"] = $itineraryId;
	}

	public function getItineraryId()
	{
		return $this->itineraryId;
	}

	public function setItineraryNo($itineraryNo)
	{
		$this->itineraryNo = $itineraryNo;
		$this->apiParas["itinerary_no"] = $itineraryNo;
	}

	public function getItineraryNo()
	{
		return $this->itineraryNo;
	}

	public function setSendDate($sendDate)
	{
		$this->sendDate = $sendDate;
		$this->apiParas["send_date"] = $sendDate;
	}

	public function getSendDate()
	{
		return $this->sendDate;
	}

	public function getApiMethodName()
	{
		return "taobao.trip.jipiao.agent.itinerary.send";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->companyCode,"companyCode");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->companyCode,20,"companyCode");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->expressCode,"expressCode");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->expressCode,32,"expressCode");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->itineraryId,"itineraryId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->itineraryNo,"itineraryNo");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->itineraryNo,32,"itineraryNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->sendDate,"sendDate");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
