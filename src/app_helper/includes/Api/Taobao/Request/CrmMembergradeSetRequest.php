<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.crm.membergrade.set request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class CrmMembergradeSetRequest
{
	/** 
	 * 买家昵称
	 **/
	private $buyerNick;
	
	/** 
	 * 买家会员级别有四种1：普通会员。2：高级会员。 3VIP会员。 4：至尊VIP<br /> 支持最大值为：4<br /> 支持最小值为：1
	 **/
	private $grade;
	
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

	public function setGrade($grade)
	{
		$this->grade = $grade;
		$this->apiParas["grade"] = $grade;
	}

	public function getGrade()
	{
		return $this->grade;
	}

	public function getApiMethodName()
	{
		return "taobao.crm.membergrade.set";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->buyerNick,"buyerNick");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->grade,"grade");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->grade,4,"grade");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->grade,1,"grade");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}