<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ebookmedia.file.query request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class EbookmediaFileQueryRequest
{
	/** 
	 * 电子书商品ID
	 **/
	private $auctionId;
	
	private $apiParas = array();
	
	public function setAuctionId($auctionId)
	{
		$this->auctionId = $auctionId;
		$this->apiParas["auction_id"] = $auctionId;
	}

	public function getAuctionId()
	{
		return $this->auctionId;
	}

	public function getApiMethodName()
	{
		return "taobao.ebookmedia.file.query";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->auctionId,"auctionId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
