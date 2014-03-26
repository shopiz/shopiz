<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.fenxiao.grade.update request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class FenxiaoGradeUpdateRequest
{
	/** 
	 * 等级ID
	 **/
	private $gradeId;
	
	/** 
	 * 等级名称，等级名称不可重复<br /> 支持最大长度为：20<br /> 支持的最大列表长度为：20
	 **/
	private $name;
	
	private $apiParas = array();
	
	public function setGradeId($gradeId)
	{
		$this->gradeId = $gradeId;
		$this->apiParas["grade_id"] = $gradeId;
	}

	public function getGradeId()
	{
		return $this->gradeId;
	}

	public function setName($name)
	{
		$this->name = $name;
		$this->apiParas["name"] = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getApiMethodName()
	{
		return "taobao.fenxiao.grade.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->gradeId,"gradeId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->name,"name");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->name,20,"name");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
