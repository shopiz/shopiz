<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.simba.insight.catsrelatedword.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:49
 */
class SimbaInsightCatsrelatedwordGetRequest
{
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	/** 
	 * 最大返回数量(1-10)<br /> 支持最大值为：10<br /> 支持最小值为：1
	 **/
	private $resultNum;
	
	/** 
	 * 查询词数组，最大长度200
	 **/
	private $words;
	
	private $apiParas = array();
	
	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function setResultNum($resultNum)
	{
		$this->resultNum = $resultNum;
		$this->apiParas["result_num"] = $resultNum;
	}

	public function getResultNum()
	{
		return $this->resultNum;
	}

	public function setWords($words)
	{
		$this->words = $words;
		$this->apiParas["words"] = $words;
	}

	public function getWords()
	{
		return $this->words;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.insight.catsrelatedword.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->resultNum,"resultNum");
		\Api\Taobao\RequestCheckUtil::checkMaxValue($this->resultNum,10,"resultNum");
		\Api\Taobao\RequestCheckUtil::checkMinValue($this->resultNum,1,"resultNum");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->words,"words");
		\Api\Taobao\RequestCheckUtil::checkMaxListSize($this->words,200,"words");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
