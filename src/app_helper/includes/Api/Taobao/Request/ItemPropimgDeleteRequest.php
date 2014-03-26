<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.item.propimg.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class ItemPropimgDeleteRequest
{
	/** 
	 * 商品属性图片ID
	 **/
	private $id;
	
	/** 
	 * 商品数字ID，必选<br /> 支持最小值为：0
	 **/
	private $numIid;
	
	private $apiParas = array();
	
	public function setId($id)
	{
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNumIid($numIid)
	{
		$this->numIid = $numIid;
		$this->apiParas["num_iid"] = $numIid;
	}

	public function getNumIid()
	{
		return $this->numIid;
	}

	public function getApiMethodName()
	{
		return "taobao.item.propimg.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->id,"id");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->numIid,"numIid");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->numIid,0,"numIid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
