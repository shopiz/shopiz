<?php

namespace Api\Taobao\Request;
/**
 * TOP API: alipay.ebpp.bill.pay request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class AlipayEbppBillPayRequest
{
	/** 
	 * 支付宝的业务订单号，具有唯一性。<br /> 支持最大长度为：28<br /> 支持的最大列表长度为：28
	 **/
	private $alipayOrderNo;
	
	/** 
	 * 如有有淘宝授权的session可以不传这个字段
	 **/
	private $authToken;
	
	/** 
	 * 输出机构的业务流水号，需要保证唯一性。<br /> 支持最大长度为：32<br /> 支持的最大列表长度为：32
	 **/
	private $merchantOrderNo;
	
	/** 
	 * 支付宝订单类型。公共事业缴纳JF,信用卡还款HK<br /> 支持最大长度为：10<br /> 支持的最大列表长度为：10
	 **/
	private $orderType;
	
	private $apiParas = array();
	
	public function setAlipayOrderNo($alipayOrderNo)
	{
		$this->alipayOrderNo = $alipayOrderNo;
		$this->apiParas["alipay_order_no"] = $alipayOrderNo;
	}

	public function getAlipayOrderNo()
	{
		return $this->alipayOrderNo;
	}

	public function setAuthToken($authToken)
	{
		$this->authToken = $authToken;
		$this->apiParas["auth_token"] = $authToken;
	}

	public function getAuthToken()
	{
		return $this->authToken;
	}

	public function setMerchantOrderNo($merchantOrderNo)
	{
		$this->merchantOrderNo = $merchantOrderNo;
		$this->apiParas["merchant_order_no"] = $merchantOrderNo;
	}

	public function getMerchantOrderNo()
	{
		return $this->merchantOrderNo;
	}

	public function setOrderType($orderType)
	{
		$this->orderType = $orderType;
		$this->apiParas["order_type"] = $orderType;
	}

	public function getOrderType()
	{
		return $this->orderType;
	}

	public function getApiMethodName()
	{
		return "alipay.ebpp.bill.pay";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->alipayOrderNo,"alipayOrderNo");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->alipayOrderNo,28,"alipayOrderNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->merchantOrderNo,"merchantOrderNo");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->merchantOrderNo,32,"merchantOrderNo");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->orderType,"orderType");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->orderType,10,"orderType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
