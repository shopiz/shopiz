<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.campaign.channeloptions.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaCampaignChanneloptionsGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.simba.campaign.channeloptions.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
