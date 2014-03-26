<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.fenxiao.productcat.add request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class FenxiaoProductcatAddRequest
{
	/** 
	 * 代销默认采购价比例，注意：100.00%，则输入为10000<br /> 支持最大值为：99999<br /> 支持最小值为：100
	 **/
	private $agentCostPercent;
	
	/** 
	 * 经销默认采购价比例，注意：100.00%，则输入为10000<br /> 支持最大值为：99999<br /> 支持最小值为：100
	 **/
	private $dealerCostPercent;
	
	/** 
	 * 产品线名称<br /> 支持最大长度为：10<br /> 支持的最大列表长度为：10
	 **/
	private $name;
	
	/** 
	 * 最高零售价比例，注意：100.00%，则输入为10000<br /> 支持最大值为：99999<br /> 支持最小值为：100
	 **/
	private $retailHighPercent;
	
	/** 
	 * 最低零售价比例，注意：100.00%，则输入为10000<br /> 支持最大值为：99999<br /> 支持最小值为：100
	 **/
	private $retailLowPercent;
	
	private $apiParas = array();
	
	public function setAgentCostPercent($agentCostPercent)
	{
		$this->agentCostPercent = $agentCostPercent;
		$this->apiParas["agent_cost_percent"] = $agentCostPercent;
	}

	public function getAgentCostPercent()
	{
		return $this->agentCostPercent;
	}

	public function setDealerCostPercent($dealerCostPercent)
	{
		$this->dealerCostPercent = $dealerCostPercent;
		$this->apiParas["dealer_cost_percent"] = $dealerCostPercent;
	}

	public function getDealerCostPercent()
	{
		return $this->dealerCostPercent;
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

	public function setRetailHighPercent($retailHighPercent)
	{
		$this->retailHighPercent = $retailHighPercent;
		$this->apiParas["retail_high_percent"] = $retailHighPercent;
	}

	public function getRetailHighPercent()
	{
		return $this->retailHighPercent;
	}

	public function setRetailLowPercent($retailLowPercent)
	{
		$this->retailLowPercent = $retailLowPercent;
		$this->apiParas["retail_low_percent"] = $retailLowPercent;
	}

	public function getRetailLowPercent()
	{
		return $this->retailLowPercent;
	}

	public function getApiMethodName()
	{
		return "taobao.fenxiao.productcat.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->agentCostPercent,"agentCostPercent");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->agentCostPercent,99999,"agentCostPercent");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->agentCostPercent,100,"agentCostPercent");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->dealerCostPercent,"dealerCostPercent");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->dealerCostPercent,99999,"dealerCostPercent");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->dealerCostPercent,100,"dealerCostPercent");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->name,"name");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->name,10,"name");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->retailHighPercent,"retailHighPercent");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->retailHighPercent,99999,"retailHighPercent");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->retailHighPercent,100,"retailHighPercent");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->retailLowPercent,"retailLowPercent");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->retailLowPercent,99999,"retailLowPercent");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->retailLowPercent,100,"retailLowPercent");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
