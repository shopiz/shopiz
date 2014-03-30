<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.item.recommend.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class ItemRecommendDeleteRequest
{
	/** 
	 * 商品数字ID，该参数必须<br /> 支持最小值为：0
	 **/
	private $numIid;
	
	private $apiParas = array();
	
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
		return "taobao.item.recommend.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->numIid,"numIid");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->numIid,0,"numIid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}