<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.promotionmisc.tool.check request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class PromotionmiscToolCheckRequest
{
	/** 
	 * 可使用的元数据。PRD审核后，会告诉isv可使用的元数据。
	 **/
	private $metaAllow;
	
	/** 
	 * 工具ID, taobao.ump.tool.add成功后返回的id。<br /> 支持最小值为：10
	 **/
	private $toolId;
	
	private $apiParas = array();
	
	public function setMetaAllow($metaAllow)
	{
		$this->metaAllow = $metaAllow;
		$this->apiParas["meta_allow"] = $metaAllow;
	}

	public function getMetaAllow()
	{
		return $this->metaAllow;
	}

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
		return "taobao.promotionmisc.tool.check";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->toolId,"toolId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->toolId,10,"toolId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
