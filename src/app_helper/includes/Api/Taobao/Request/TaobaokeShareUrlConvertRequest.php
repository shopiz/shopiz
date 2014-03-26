<?php
/**
 * TOP API: taobao.taobaoke.share.url.convert request
 * 
 * @author auto create
 * @since 1.0, 2014-03-15 17:14:59
 */
class TaobaokeShareUrlConvertRequest
{
	/** 
	 * 自定义输入串.格式:英文和数字组成;长度不能大于12个字符,区分不同的推广渠道,如:bbs,表示bbs为推广渠道;blog,表示blog为推广渠道
	 **/
	private $outerCode;
	
	/** 
	 * 生成点击串pid,必须是mm_xxxx_0_0这种格式中间的"xxxx"，三方pid即appkey对应pid
	 **/
	private $pid;
	
	/** 
	 * 需要转化为淘客链接的无线平台url
	 **/
	private $url;
	
	private $apiParas = array();
	
	public function setOuterCode($outerCode)
	{
		$this->outerCode = $outerCode;
		$this->apiParas["outer_code"] = $outerCode;
	}

	public function getOuterCode()
	{
		return $this->outerCode;
	}

	public function setPid($pid)
	{
		$this->pid = $pid;
		$this->apiParas["pid"] = $pid;
	}

	public function getPid()
	{
		return $this->pid;
	}

	public function setUrl($url)
	{
		$this->url = $url;
		$this->apiParas["url"] = $url;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getApiMethodName()
	{
		return "taobao.taobaoke.share.url.convert";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->pid,"pid");
		RequestCheckUtil::checkNotNull($this->url,"url");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
