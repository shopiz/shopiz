<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.appip.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class AppipGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.appip.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
