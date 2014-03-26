<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.campaign.platform.update request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaCampaignPlatformUpdateRequest
{
	/** 
	 * 推广计划Id
	 **/
	private $campaignId;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	/** 
	 * 非搜索投放频道代码数组，频道代码必须是直通车非搜索类频道列表中的值。<br /> 支持最大值为：128<br /> 支持最小值为：0
	 **/
	private $nonsearchChannels;
	
	/** 
	 * 溢价的百分比，必须是大于等于 1小于等于200的整数<br /> 支持最大值为：200<br /> 支持最小值为：1
	 **/
	private $outsideDiscount;
	
	/** 
	 * 搜索投放频道代码数组，频道代码必须是直通车搜索类频道列表中的值，必须包含淘宝内网。<br /> 支持最大值为：128<br /> 支持最小值为：0
	 **/
	private $searchChannels;
	
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

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function setNonsearchChannels($nonsearchChannels)
	{
		$this->nonsearchChannels = $nonsearchChannels;
		$this->apiParas["nonsearch_channels"] = $nonsearchChannels;
	}

	public function getNonsearchChannels()
	{
		return $this->nonsearchChannels;
	}

	public function setOutsideDiscount($outsideDiscount)
	{
		$this->outsideDiscount = $outsideDiscount;
		$this->apiParas["outside_discount"] = $outsideDiscount;
	}

	public function getOutsideDiscount()
	{
		return $this->outsideDiscount;
	}

	public function setSearchChannels($searchChannels)
	{
		$this->searchChannels = $searchChannels;
		$this->apiParas["search_channels"] = $searchChannels;
	}

	public function getSearchChannels()
	{
		return $this->searchChannels;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.campaign.platform.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->campaignId,"campaignId");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->nonsearchChannels,10,"nonsearchChannels");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->outsideDiscount,"outsideDiscount");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->outsideDiscount,200,"outsideDiscount");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->outsideDiscount,1,"outsideDiscount");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->searchChannels,"searchChannels");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->searchChannels,10,"searchChannels");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
