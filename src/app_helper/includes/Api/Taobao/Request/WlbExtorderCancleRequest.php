<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.wlb.extorder.cancle request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class WlbExtorderCancleRequest
{
	/** 
	 * 外部单据编号
	 **/
	private $extOrderCode;
	
	private $apiParas = array();
	
	public function setExtOrderCode($extOrderCode)
	{
		$this->extOrderCode = $extOrderCode;
		$this->apiParas["ext_order_code"] = $extOrderCode;
	}

	public function getExtOrderCode()
	{
		return $this->extOrderCode;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.extorder.cancle";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->extOrderCode,"extOrderCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
