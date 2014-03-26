<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.tmc.message.produce request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TmcMessageProduceRequest
{
	/** 
	 * 消息内容的JSON表述，必须按照topic的定义来填充<br /> 支持最大长度为：1024<br /> 支持的最大列表长度为：1024
	 **/
	private $content;
	
	/** 
	 * 发布消息关联的主题<br /> 支持最大长度为：256<br /> 支持的最大列表长度为：256
	 **/
	private $topic;
	
	private $apiParas = array();
	
	public function setContent($content)
	{
		$this->content = $content;
		$this->apiParas["content"] = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setTopic($topic)
	{
		$this->topic = $topic;
		$this->apiParas["topic"] = $topic;
	}

	public function getTopic()
	{
		return $this->topic;
	}

	public function getApiMethodName()
	{
		return "taobao.tmc.message.produce";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->content,"content");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->content,1024,"content");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->topic,"topic");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->topic,256,"topic");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
