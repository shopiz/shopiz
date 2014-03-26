<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.weitao.message.create request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WeitaoMessageCreateRequest
{
	/** 
	 * act_type=1，创建普通消息，影响用户组在消息中心可以看到消息； act_type=2, 只创建消息，不主动发送，当用户点击菜单并有相应绑定的事件时，才主动来获取消息内容。<br /> 支持最小值为：1
	 **/
	private $actType;
	
	/** 
	 * 消息的具体内容，json格式 type=1时，json由text、url属性组成，text必须输入，长度不能超过560字符； type=6时，json由title、imageUrl、text、url组成，每项必须输入，其中title不能超过64字符，imageUrl必须为当前用户图片空间图片，text不能超过280字符； type=7时，json由多组图文属性title、imageUrl、text、url组成，text可以为空但是长度不能超过280字符，其他同type=6规则。 所有url禁止微信的连接地址，所有的内容，含有有非法关键字都不能提交成功。
	 **/
	private $jsonContent;
	
	/** 
	 * 由英文逗号分隔的用户组数字ID。指当前消息作用于对应的用户组，act_type=1必须输入；act_type=2时，不须输入，输入无效
	 **/
	private $receiveGroup;
	
	/** 
	 * 消息类型，目前只支持：type=1 单条文本、连接消息；type=6 单条图片、标题、文本内容、连接组成的的消息；type=7 由多条图片、标题、文本内容、连接组成的消息。<br /> 支持最小值为：1
	 **/
	private $type;
	
	private $apiParas = array();
	
	public function setActType($actType)
	{
		$this->actType = $actType;
		$this->apiParas["act_type"] = $actType;
	}

	public function getActType()
	{
		return $this->actType;
	}

	public function setJsonContent($jsonContent)
	{
		$this->jsonContent = $jsonContent;
		$this->apiParas["json_content"] = $jsonContent;
	}

	public function getJsonContent()
	{
		return $this->jsonContent;
	}

	public function setReceiveGroup($receiveGroup)
	{
		$this->receiveGroup = $receiveGroup;
		$this->apiParas["receive_group"] = $receiveGroup;
	}

	public function getReceiveGroup()
	{
		return $this->receiveGroup;
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
		return "taobao.weitao.message.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->actType,"actType");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->actType,1,"actType");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->jsonContent,"jsonContent");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->type,"type");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->type,1,"type");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
