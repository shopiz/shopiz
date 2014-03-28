<?php
namespace Taobao;

class Category extends \Api\Taobao\TopClient
{

    private static $_errors = array(
        'isv.missing-parameter:bulletin-and-title-and-desc' => '请输入要修改的参数，至少传入一个参数',
        'isv.shop-service-error:SHOP_TITLE_DUPLICATE' => '店铺重名',
    );

    public function getShopInfo($userNick = '')
    {
        $req = new \Api\Taobao\Request\ShopGetRequest();
        $req->setFields("sid,cid,title,nick,desc,bulletin,pic_path,created,modified");
        $req->setNick($userNick);
        $resp = $this->execute($req);

        print_r($resp);
    }

    /**
     * 获取标准商品类目属性
     */
    public function getItemCategoryList($parentCid, $cids = '')
    {
        $req = new \Api\Taobao\Request\ItemcatsGetRequest();
        $req->setFields("cid,parent_cid,name,is_parent");
        $req->setParentCid($parentCid);
        if (!empty($cids)) {
            $req->setCids($cids);
        }
        $resp = $this->execute($req, $sessionKey);

        print_r($resp);exit;
        if (isset($resp['item_cats']['item_cat'])) {
            $res = array(
                'status' => 1,
                'msg'    => '',
                'result' => $resp['item_cats']['item_cat'],
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
     * 获取标准商品类目属性
     */
    public function getItemPropList($sessionKey, $params = array())
    {
        $req = new \Api\Taobao\Request\ItempropsGetRequest();
        $req->setFields("pid,name,must,multi,prop_values");
        $req->setCid($params['cid']);
        unset($params['cid']);
        foreach ($params as $k => $v) {
            $op = "set" . ucfirst(str_replace("_", "", $k));
            // echo $op;exit;
            $req->$op($v);
        }
        $resp = $this->execute($req, $sessionKey);

        if (isset($resp['item_props']['item_prop'])) {
            $res = array(
                'status' => 1,
                'msg'    => '',
                'result' => $resp['item_props']['item_prop'],
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
     * 批量获取商品信息
     */
    public function getAuthorizeCategoryList($sessionKey)
    {
        $req = new \Api\Taobao\Request\ItemcatsAuthorizeGetRequest();
        $req->setFields("brand.vid,brand.name,item_cat.cid,item_cat.name,item_cat.status,item_cat.sort_order,item_cat.parent_cid,item_cat.is_parent");
        $resp = $this->execute($req, $sessionKey);

        print_r($resp);exit;
        if (isset($resp['items']['item'])) {
            if (isset($resp['items']['item'])) {
                $res = array(
                    'status' => 1,
                    'msg'    => '',
                    'result' => $resp['items']['item'],
                );
            } else {
                $res = array(
                    'status' => 1,
                    'msg'    => '',
                    'result' => $resp,
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

