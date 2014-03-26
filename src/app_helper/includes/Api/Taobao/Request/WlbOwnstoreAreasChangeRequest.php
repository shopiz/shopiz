<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.ownstore.areas.change request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbOwnstoreAreasChangeRequest
{
	/** 
	 * 例子：510000,140000<br /> 支持的最大列表长度为：600
	 **/
	private $areaCodes;
	
	/** 
	 * 要设置区域的对应的订阅服务code
	 **/
	private $serviceCode;
	
	/** 
	 * 区域设置类型：如添加、删除。
如添加区域，请设值为ADD；
如删除区域，请设值为DELETE<br /> 支持最大长度为：8<br /> 支持的最大列表长度为：8
	 **/
	private $type;
	
	private $apiParas = array();
	
	public function setAreaCodes($areaCodes)
	{
		$this->areaCodes = $areaCodes;
		$this->apiParas["area_codes"] = $areaCodes;
	}

	public function getAreaCodes()
	{
		return $this->areaCodes;
	}

	public function setServiceCode($serviceCode)
	{
		$this->serviceCode = $serviceCode;
		$this->apiParas["service_code"] = $serviceCode;
	}

	public function getServiceCode()
	{
		return $this->serviceCode;
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
		return "taobao.wlb.ownstore.areas.change";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->areaCodes,"areaCodes");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->areaCodes,50,"areaCodes");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->areaCodes,600,"areaCodes");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->serviceCode,"serviceCode");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->type,"type");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->type,8,"type");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
