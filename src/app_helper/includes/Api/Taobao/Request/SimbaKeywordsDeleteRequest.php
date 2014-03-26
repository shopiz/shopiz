<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.keywords.delete request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaKeywordsDeleteRequest
{
	/** 
	 * 推广计划Id
	 **/
	private $campaignId;
	
	/** 
	 * 关键词Id数组，最多100个
	 **/
	private $keywordIds;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setCampaignId($campaignId)
	{
		$this->campaignId = $campaignId;
		$this->apiParas["campaign_id"] = $campaignId;
	}

	public function getCampaignId()
	{
		return $this->campaignId;
	}

	public function setKeywordIds($keywordIds)
	{
		$this->keywordIds = $keywordIds;
		$this->apiParas["keyword_ids"] = $keywordIds;
	}

	public function getKeywordIds()
	{
		return $this->keywordIds;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.keywords.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->campaignId,"campaignId");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->keywordIds,"keywordIds");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->keywordIds,100,"keywordIds");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
