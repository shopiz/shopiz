<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.cloudtags.group.add request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoCloudtagsGroupAddRequest
{
	/** 
	 * 分组的sql
	 **/
	private $expression;
	
	/** 
	 * 组的描述<br /> 支持最大长度为：100<br /> 支持的最大列表长度为：100
	 **/
	private $groupDesc;
	
	/** 
	 * 组的名字<br /> 支持最大长度为：32<br /> 支持的最大列表长度为：32
	 **/
	private $groupName;
	
	private $apiParas = array();
	
	public function setExpression($expression)
	{
		$this->expression = $expression;
		$this->apiParas["expression"] = $expression;
	}

	public function getExpression()
	{
		return $this->expression;
	}

	public function setGroupDesc($groupDesc)
	{
		$this->groupDesc = $groupDesc;
		$this->apiParas["group_desc"] = $groupDesc;
	}

	public function getGroupDesc()
	{
		return $this->groupDesc;
	}

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}

	public function getGroupName()
	{
		return $this->groupName;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.cloudtags.group.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->expression,"expression");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->groupDesc,"groupDesc");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->groupDesc,100,"groupDesc");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->groupName,"groupName");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->groupName,32,"groupName");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
