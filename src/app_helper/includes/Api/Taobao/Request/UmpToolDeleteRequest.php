<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.ump.tool.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class UmpToolDeleteRequest
{
	/** 
	 * 营销工具id
	 **/
	private $toolId;
	
	private $apiParas = array();
	
	public function setToolId($toolId)
	{
		$this->toolId = $toolId;
		$this->apiParas["tool_id"] = $toolId;
	}

	public function getToolId()
	{
		return $this->toolId;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.tool.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->toolId,"toolId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
