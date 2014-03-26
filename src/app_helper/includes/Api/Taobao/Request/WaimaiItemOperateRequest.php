<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.waimai.item.operate request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WaimaiItemOperateRequest
{
	/** 
	 * 待操作宝贝id，多个以英文逗号分隔
	 **/
	private $ids;
	
	/** 
	 * 操作类型(1上架2下架3删除)
	 **/
	private $o;
	
	private $apiParas = array();
	
	public function setIds($ids)
	{
		$this->ids = $ids;
		$this->apiParas["ids"] = $ids;
	}

	public function getIds()
	{
		return $this->ids;
	}

	public function setO($o)
	{
		$this->o = $o;
		$this->apiParas["o"] = $o;
	}

	public function getO()
	{
		return $this->o;
	}

	public function getApiMethodName()
	{
		return "taobao.waimai.item.operate";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->ids,"ids");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->o,"o");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
