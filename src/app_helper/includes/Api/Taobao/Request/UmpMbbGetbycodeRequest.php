<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ump.mbb.getbycode request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class UmpMbbGetbycodeRequest
{
	/** 
	 * 营销积木块code
	 **/
	private $code;
	
	private $apiParas = array();
	
	public function setCode($code)
	{
		$this->code = $code;
		$this->apiParas["code"] = $code;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.mbb.getbycode";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->code,"code");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
