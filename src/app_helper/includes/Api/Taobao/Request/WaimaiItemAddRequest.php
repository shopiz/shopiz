<?php

namespace Api\Taobao\Request;
/**
 * TOP API: taobao.waimai.item.add request
 * 
 * @author auto create
 * @since 1.0, 2014-03-20 13:15:50
 */
class WaimaiItemAddRequest
{
	/** 
	 * 商品描述，至少输入5个字
	 **/
	private $auctiondesc;
	
	/** 
	 * 商品状态(0立即出售,-2放入仓库)
	 **/
	private $auctionstatus;
	
	/** 
	 * 宝贝所属后台类目
	 **/
	private $categoryid;
	
	/** 
	 * 商品外部编码，没有则为空
	 **/
	private $goodsno;
	
	/** 
	 * 限购数量,不输入则表示该宝贝无限购数
	 **/
	private $limitbuy;
	
	/** 
	 * 宝贝原价，最多两位小数
	 **/
	private $oriprice;
	
	/** 
	 * 宝贝图片
	 **/
	private $picurl;
	
	/** 
	 * 宝贝现在价格,最多两位小数<br /> 支持最大长度为：8<br /> 支持的最大列表长度为：8
	 **/
	private $price;
	
	/** 
	 * 菜品库存(范围1-999999)<br /> 支持的最大列表长度为：6
	 **/
	private $quantity;
	
	/** 
	 * 外卖店铺id，多个以英文逗号分隔
	 **/
	private $shopids;
	
	/** 
	 * 菜名<br /> 支持最大长度为：30<br /> 支持的最大列表长度为：30
	 **/
	private $title;
	
	/** 
	 * 宝贝副图，最多可上传4张
	 **/
	private $viceimage;
	
	private $apiParas = array();
	
	public function setAuctiondesc($auctiondesc)
	{
		$this->auctiondesc = $auctiondesc;
		$this->apiParas["auctiondesc"] = $auctiondesc;
	}

	public function getAuctiondesc()
	{
		return $this->auctiondesc;
	}

	public function setAuctionstatus($auctionstatus)
	{
		$this->auctionstatus = $auctionstatus;
		$this->apiParas["auctionstatus"] = $auctionstatus;
	}

	public function getAuctionstatus()
	{
		return $this->auctionstatus;
	}

	public function setCategoryid($categoryid)
	{
		$this->categoryid = $categoryid;
		$this->apiParas["categoryid"] = $categoryid;
	}

	public function getCategoryid()
	{
		return $this->categoryid;
	}

	public function setGoodsno($goodsno)
	{
		$this->goodsno = $goodsno;
		$this->apiParas["goodsno"] = $goodsno;
	}

	public function getGoodsno()
	{
		return $this->goodsno;
	}

	public function setLimitbuy($limitbuy)
	{
		$this->limitbuy = $limitbuy;
		$this->apiParas["limitbuy"] = $limitbuy;
	}

	public function getLimitbuy()
	{
		return $this->limitbuy;
	}

	public function setOriprice($oriprice)
	{
		$this->oriprice = $oriprice;
		$this->apiParas["oriprice"] = $oriprice;
	}

	public function getOriprice()
	{
		return $this->oriprice;
	}

	public function setPicurl($picurl)
	{
		$this->picurl = $picurl;
		$this->apiParas["picurl"] = $picurl;
	}

	public function getPicurl()
	{
		return $this->picurl;
	}

	public function setPrice($price)
	{
		$this->price = $price;
		$this->apiParas["price"] = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		$this->apiParas["quantity"] = $quantity;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setShopids($shopids)
	{
		$this->shopids = $shopids;
		$this->apiParas["shopids"] = $shopids;
	}

	public function getShopids()
	{
		return $this->shopids;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		$this->apiParas["title"] = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setViceimage($viceimage)
	{
		$this->viceimage = $viceimage;
		$this->apiParas["viceimage"] = $viceimage;
	}

	public function getViceimage()
	{
		return $this->viceimage;
	}

	public function getApiMethodName()
	{
		return "taobao.waimai.item.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->auctiondesc,"auctiondesc");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->auctionstatus,"auctionstatus");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->categoryid,"categoryid");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->picurl,"picurl");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->price,"price");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->price,8,"price");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->quantity,"quantity");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->shopids,"shopids");
		\Api\Taobao\RequestCheckUtil::checkNotNull($this->title,"title");
		\Api\Taobao\RequestCheckUtil::checkMaxLength($this->title,30,"title");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
