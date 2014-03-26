<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.item.consignment.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbItemConsignmentDeleteRequest
{
	/** 
	 * 代销商前台宝贝ID
	 **/
	private $icItemId;
	
	/** 
	 * 货主的物流宝商品ID
	 **/
	private $ownerItemId;
	
	/** 
	 * 授权关系id
	 **/
	private $ruleId;
	
	private $apiParas = array();
	
	public function setIcItemId($icItemId)
	{
		$this->icItemId = $icItemId;
		$this->apiParas["ic_item_id"] = $icItemId;
	}

	public function getIcItemId()
	{
		return $this->icItemId;
	}

	public function setOwnerItemId($ownerItemId)
	{
		$this->ownerItemId = $ownerItemId;
		$this->apiParas["owner_item_id"] = $ownerItemId;
	}

	public function getOwnerItemId()
	{
		return $this->ownerItemId;
	}

	public function setRuleId($ruleId)
	{
		$this->ruleId = $ruleId;
		$this->apiParas["rule_id"] = $ruleId;
	}

	public function getRuleId()
	{
		return $this->ruleId;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.item.consignment.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->icItemId,"icItemId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->ownerItemId,"ownerItemId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->ruleId,"ruleId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
