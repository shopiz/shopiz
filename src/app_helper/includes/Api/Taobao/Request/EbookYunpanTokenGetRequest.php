<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ebook.yunpan.token.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class EbookYunpanTokenGetRequest
{
	/** 
	 * 申请云盘应用的client_id
	 **/
	private $clientId;
	
	private $apiParas = array();
	
	public function setClientId($clientId)
	{
		$this->clientId = $clientId;
		$this->apiParas["client_id"] = $clientId;
	}

	public function getClientId()
	{
		return $this->clientId;
	}

	public function getApiMethodName()
	{
		return "taobao.ebook.yunpan.token.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->clientId,"clientId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
