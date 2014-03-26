<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.cloudtags.group.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoCloudtagsGroupDeleteRequest
{
	/** 
	 * 需要删除的用户分组ID，必须为当前操作用户的粉丝分组ID<br /> 支持最小值为：1
	 **/
	private $groupId;
	
	private $apiParas = array();
	
	public function setGroupId($groupId)
	{
		$this->groupId = $groupId;
		$this->apiParas["group_id"] = $groupId;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.cloudtags.group.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->groupId,"groupId");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->groupId,1,"groupId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
