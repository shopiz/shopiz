<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.sp.content.deleteclass request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class SpContentDeleteclassRequest
{
	/** 
	 * 分类名称
	 **/
	private $classname;
	
	/** 
	 * 站长Key<br /> 支持最大长度为：32<br /> 支持的最大列表长度为：32
	 **/
	private $siteKey;
	
	private $apiParas = array();
	
	public function setClassname($classname)
	{
		$this->classname = $classname;
		$this->apiParas["classname"] = $classname;
	}

	public function getClassname()
	{
		return $this->classname;
	}

	public function setSiteKey($siteKey)
	{
		$this->siteKey = $siteKey;
		$this->apiParas["site_key"] = $siteKey;
	}

	public function getSiteKey()
	{
		return $this->siteKey;
	}

	public function getApiMethodName()
	{
		return "taobao.sp.content.deleteclass";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->classname,"classname");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->siteKey,"siteKey");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->siteKey,32,"siteKey");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
