<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.crm.members.group.batchadd request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class CrmMembersGroupBatchaddRequest
{
	/** 
	 * 会员的id（一次最多传入10个）<br /> 支持最小值为：1
	 **/
	private $buyerIds;
	
	/** 
	 * 分组id<br /> 支持最小值为：1
	 **/
	private $groupIds;
	
	private $apiParas = array();
	
	public function setBuyerIds($buyerIds)
	{
		$this->buyerIds = $buyerIds;
		$this->apiParas["buyer_ids"] = $buyerIds;
	}

	public function getBuyerIds()
	{
		return $this->buyerIds;
	}

	public function setGroupIds($groupIds)
	{
		$this->groupIds = $groupIds;
		$this->apiParas["group_ids"] = $groupIds;
	}

	public function getGroupIds()
	{
		return $this->groupIds;
	}

	public function getApiMethodName()
	{
		return "taobao.crm.members.group.batchadd";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->buyerIds,"buyerIds");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->buyerIds,10,"buyerIds");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->groupIds,"groupIds");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->groupIds,10,"groupIds");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
