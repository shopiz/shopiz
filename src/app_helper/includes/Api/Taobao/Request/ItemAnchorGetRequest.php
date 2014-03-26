<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.item.anchor.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class ItemAnchorGetRequest
{
	/** 
	 * 对应类目编号
	 **/
	private $catId;
	
	/** 
	 * 宝贝模板类型是人工打标还是自动打标：人工打标为1，自动打标为0.人工和自动打标为-1.<br /> 支持最大值为：1<br /> 支持最小值为：-1
	 **/
	private $type;
	
	private $apiParas = array();
	
	public function setCatId($catId)
	{
		$this->catId = $catId;
		$this->apiParas["cat_id"] = $catId;
	}

	public function getCatId()
	{
		return $this->catId;
	}

	public function setType($type)
	{
		$this->type = $type;
		$this->apiParas["type"] = $type;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getApiMethodName()
	{
		return "taobao.item.anchor.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->catId,"catId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->type,"type");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->type,1,"type");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->type,-1,"type");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
