<?php
namespace Taobao;

class Shop extends \Api\Taobao\TopClient
{

    private static $errors = array(
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

    public function updateShopInfo($sessionKey, $shopInfo)
    {
        $req = new \Api\Taobao\Request\ShopUpdateRequest();
        $req->setCid($shopInfo['title']);
        $req->setName($shopInfo['bulletin']);
        $req->setPictUrl($shopInfo['desc']);
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

    /**
     * 批量获取商品信息
     */
    public function getMultiItemInfo($sessionKey, $numIids = '', $trackIids = '')
    {
        $req = new \Api\Taobao\Request\ItemsListGetRequest();
        $req->setFields("detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_url,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,approve_status,postage_id,product_id,auction_point,property_alias,item_img,prop_img,sku,video,outer_id,is_virtual");
        $req->setNumIids($numIids);
        // $req->setTrackIid();
        if (!empty($trackIid)) {
            $req->setTrackIids($trackIids);
        }
        $resp = $this->execute($req, $sessionKey);

        // print_r($resp);
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

    /**
     * 得到当前会话用户库存中的商品列表
     * @param $sessionKey
     * @return @res
     */
    public function getInventoryList($sessionKey)
    {
        $req = new \Api\Taobao\Request\ItemsInventoryGetRequest();
        $req->setFields("num_iid,title,price");
        // $req->setQ("N97");
        // $req->setCid(1512);
        // $req->setSellerCids("11");
        // $req->setPageNo(10);
        // $req->setHasDiscount("true");
        // $req->setHasShowcase("true");
        // $req->setOrderBy("list_time:desc");
        // $req->setIsTaobao("true");
        // $req->setIsEx("true");
        // $req->setPageSize(100);
        // $req->setStartModified("2000-01-01 00:00:00");
        // $req->setEndModified("2000-01-01 00:00:00");
        //
        $page      = 1;
        $page_size = 100;
        $items     = array();
        $is_error  = false;
        $req->setPageSize($page_size);
        do {
            $req->setPageNo($page);
            $resp = $this->execute($req, $sessionKey);
            // echo count($resp['items']['item']), '<br />';
            // sleep(2);
            if (!empty($resp['items']['item'])) {
                if (isset($resp['items']['item'][0])) {
                    $items = array_merge($items, $resp['items']['item']);
                } else {
                    $items[] = $resp['items']['item'];
                }
            }
            $total_record = $resp['total_results'];
            // $total_record = $resp->total_results;
            $total_page   = ceil($total_record / $page_size);
            $page ++;
            usleep(500);
        } while ($page <= $total_page);

        if (!$is_error) {
            $res = array(
                'status' => 1,
                'items'  => $items,
            );
        } else {
            $res = array(
                'status' => 0,
                'msg'    => '错误',
            );
        }

        return $res;
    }

    /**
     * 获取当前会话用户出售中的商品列表
     * @param $sessionKey
     * @return @res
     */
    public function getOnsaleList($sessionKey)
    {
        $req = new \Api\Taobao\Request\ItemsOnsaleGetRequest();
        $req->setFields("num_iid,title,price");
        // $req->setQ("N97");
        // $req->setCid(1512);
        // $req->setSellerCids("11");
        // $req->setPageNo(10);
        // $req->setHasDiscount("true");
        // $req->setHasShowcase("true");
        // $req->setOrderBy("list_time:desc");
        // $req->setIsTaobao("true");
        // $req->setIsEx("true");
        // $req->setPageSize(100);
        // $req->setStartModified("2000-01-01 00:00:00");
        // $req->setEndModified("2000-01-01 00:00:00");
        //
        $page      = 1;
        $page_size = 10;
        $items     = array();
        $is_error  = false;
        $req->setPageSize($page_size);
        do {
            $req->setPageNo($page);
            $resp = $this->execute($req, $sessionKey);
            // echo count($resp['items']['item']), '<br />';
            // sleep(2);
            if (!empty($resp['items']['item'])) {
                if (isset($resp['items']['item'][0])) {
                    $items = array_merge($items, $resp['items']['item']);
                } else {
                    $items[] = $resp['items']['item'];
                }
            } else {
                $is_error = true;
            }
            $total_record = $resp['total_results'];
            // $total_record = $resp->total_results;
            $total_page   = ceil($total_record / $page_size);
            $page ++;
            usleep(500);
        } while ($page <= $total_page);

        if (!$is_error) {
            $res = array(
                'status' => 1,
                'items'  => $items,
            );
        } else {
            $res = array(
                'status' => 0,
                'msg'    => '错误',
            );
        }

        return $res;
    }
}

