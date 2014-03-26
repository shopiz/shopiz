<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.feed.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoFeedGetRequest
{
	/** 
	 * feed的Id<br /> 支持最小值为：1
	 **/
	private $feedId;
	
	private $apiParas = array();
	
	public function setFeedId($feedId)
	{
		$this->feedId = $feedId;
		$this->apiParas["feed_id"] = $feedId;
	}

	public function getFeedId()
	{
		return $this->feedId;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.feed.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->feedId,"feedId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->feedId,1,"feedId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
