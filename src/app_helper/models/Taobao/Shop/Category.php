<?php
namespace Taobao\Shop;

class Category extends \Api\Taobao\TopClient
{

    private $type = array(
        'manual_type',
        'new_type',
        'tree_type',
        'property_type',
        'brand_type',
    );

    private static $errors = array(
        'isv.shop-service-error:SHOP_CATEGORY_ORDER_ERROR' => '商品类目在页面上的排序出错',
        'isv.shop-service-error:SHOP_CAT_IS_EXIST'         => '商品类目已经存在',

        'isv.invalid-parameter:uid'       => '用户对应的店铺已过期，或者不存在',
        'isv.user-not-exist:invalid-nick' => '用户不存在，非法用户名',
        'isv.shop-not-exist'              => '用户店铺不存在',
    );

    public function addCategory($sessionKey, $categoryInfo)
    {
        $req = new \Api\Taobao\Request\SellercatsListAddRequest();
        $req->setName($categoryInfo['name']);
        $req->setPictUrl($categoryInfo['pic_url']);
        $req->setParentCid($categoryInfo['parent_cid']);
        $req->setSortOrder($categoryInfo['sort_order']);
        $resp = $this->execute($req, $sessionKey);

        if (isset($resp['seller_cat']['cid'])) {
            $res = array(
                'status' => 1,
                'msg'    => '',
                'result' => $resp['seller_cat'],
            );
        } else {
            $res = array(
                'status' => 0,
                'msg'    => self::$_errors[$resp['sub_code']],
            );
        }

        return $res;
    }

    public function updateCategory($sessionKey, $categoryInfo)
    {
        $req = new \Api\Taobao\Request\SellercatsListUpdateRequest();
        $req->setCid($categoryInfo['cid']);
        $req->setName($categoryInfo['name']);
        $req->setPictUrl($categoryInfo['pic_url']);
        $req->setSortOrder($categoryInfo['sort_order']);
        $resp = $this->execute($req, $sessionKey);

        if (isset($resp['seller_cat']['cid'])) {
            $res = array(
                'status' => 1,
                'msg'    => '',
                'result' => $resp['seller_cat'],
            );
        } else {
            $res = array(
                'status' => 0,
                'msg'    => self::$_errors[$resp['sub_code']],
            );
        }

        return $res;
    }

    public function getCategoryInfo($userNick)
    {
        $req = new \Api\Taobao\Request\ShopGetRequest();
        $req->setFields("sid,cid,title,nick,desc,bulletin,pic_path,created,modified");
        $req->setNick($userNick);
        $resp = $this->execute($req);

        print_r($resp);
    }

    /**
     * 获取前台展示的店铺类目
     */
    public function getCategoryList($userNick)
    {
        $req = new \Api\Taobao\Request\SellercatsListGetRequest();
        $req->setNick($userNick);
        $resp = $this->execute($req);

        // print_r($resp);
        if (isset($resp['seller_cats']['seller_cat'])) {
            $res = array(
                'status' => 1,
                'msg'    => '',
                'items'  =>$resp['seller_cats']['seller_cat'],
            );
        } else {
            $res = array(
                'status' => 0,
                'msg'    => self::$_errors[$resp['sub_code']],
            );
        }

        return $res;
    }

    /**
     * 获取前台展示的店铺内卖家自定义商品类目
     */
    public function getShopCategoryList()
    {
        $req = new \Api\Taobao\Request\ShopcatsListGetRequest();
        $req->setFields("cid,parent_cid,name,is_parent");
        $resp = $this->execute($req);

        print_r($resp);

        // print_r($resp);
        if (isset($resp['items']['item'])) {
            if (isset($resp['items']['item'])) {
                $res = array(
                    'status' => 1,
                    'msg'    => '',
                    'items'  => $resp['items']['item'],
                );
            } else {
                $res = array(
                    'status'   => 1,
                    'msg'      => '',
                    'items'    => $resp,
                );
            }
        } else {
            $res = array(
                'status' => 0,
                'msg'    => self::$_errors[$resp['sub_code']],
            );
        }

        return $res;
    }
}

