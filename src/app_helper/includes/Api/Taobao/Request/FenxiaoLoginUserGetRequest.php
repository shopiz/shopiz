<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.fenxiao.login.user.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class FenxiaoLoginUserGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.fenxiao.login.user.get";
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
