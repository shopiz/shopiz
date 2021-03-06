<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.trade.postage.update request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class TradePostageUpdateRequest
{
	/** 
	 * 邮费价格(邮费单位是元）
	 **/
	private $postFee;
	
	/** 
	 * 主订单编号
	 **/
	private $tid;
	
	private $apiParas = array();
	
	public function setPostFee($postFee)
	{
		$this->postFee = $postFee;
		$this->apiParas["post_fee"] = $postFee;
	}

	public function getPostFee()
	{
		return $this->postFee;
	}

	public function setTid($tid)
	{
		$this->tid = $tid;
		$this->apiParas["tid"] = $tid;
	}

	public function getTid()
	{
		return $this->tid;
	}

	public function getApiMethodName()
	{
		return "taobao.trade.postage.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->postFee,"postFee");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->tid,"tid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
