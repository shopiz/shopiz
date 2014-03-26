<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.itemcats.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class ItemcatsGetRequest
{
	/** 
	 * 商品所属类目ID列表，用半角逗号(,)分隔 例如:(18957,19562,) (cids、parent_cid至少传一个)<br /> 支持最大值为：9223372036854775807<br /> 支持最小值为：0
	 **/
	private $cids;
	
	/** 
	 * 需要返回的字段列表，见ItemCat，默认返回：cid,parent_cid,name,is_parent
	 **/
	private $fields;
	
	/** 
	 * 父商品类目 id，0表示根节点, 传输该参数返回所有子类目。 (cids、parent_cid至少传一个)<br /> 支持最大值为：9223372036854775807<br /> 支持最小值为：0
	 **/
	private $parentCid;
	
	private $apiParas = array();
	
	public function setCids($cids)
	{
		$this->cids = $cids;
		$this->apiParas["cids"] = $cids;
	}

	public function getCids()
	{
		return $this->cids;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setParentCid($parentCid)
	{
		$this->parentCid = $parentCid;
		$this->apiParas["parent_cid"] = $parentCid;
	}

	public function getParentCid()
	{
		return $this->parentCid;
	}

	public function getApiMethodName()
	{
		return "taobao.itemcats.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->cids,1000,"cids");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->parentCid,9223372036854775807,"parentCid");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->parentCid,0,"parentCid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
