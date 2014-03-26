<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.bill.book.bill.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class BillBookBillGetRequest
{
	/** 
	 * 虚拟账户流水编号
	 **/
	private $bid;
	
	/** 
	 * 需要返回的字段:参见BookBill结构体
	 **/
	private $fields;
	
	private $apiParas = array();
	
	public function setBid($bid)
	{
		$this->bid = $bid;
		$this->apiParas["bid"] = $bid;
	}

	public function getBid()
	{
		return $this->bid;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function getApiMethodName()
	{
		return "taobao.bill.book.bill.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->bid,"bid");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->fields,"fields");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
