<?php

namespace Api\Taobao\Request;
/**
 * TOP API: tmall.promotag.tag.removetag request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class TmallPromotagTagRemovetagRequest
{
	/** 
	 * 需要删除的标签id
	 **/
	private $tagId;
	
	private $apiParas = array();
	
	public function setTagId($tagId)
	{
		$this->tagId = $tagId;
		$this->apiParas["tag_id"] = $tagId;
	}

	public function getTagId()
	{
		return $this->tagId;
	}

	public function getApiMethodName()
	{
		return "tmall.promotag.tag.removetag";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->tagId,"tagId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
