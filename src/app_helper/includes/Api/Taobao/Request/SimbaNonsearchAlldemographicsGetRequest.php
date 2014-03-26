<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.nonsearch.alldemographics.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaNonsearchAlldemographicsGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.simba.nonsearch.alldemographics.get";
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
