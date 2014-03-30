<?php
namespace Taobao;

class Items extends \Api\Taobao\TopClient
{

    public function getItemInfo($sessionKey, $numIid = '', $trackIid = '')
    {
        $req = new \Api\Taobao\Request\ItemGetRequest();
        $req->setFields("detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_url,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,approve_status,postage_id,product_id,auction_point,property_alias,item_img,prop_img,sku,video,outer_id,is_virtual");
        $req->setNumIid($numIid);
        // $req->setTrackIid();
        if (!empty($trackIid)) {
            $req->setTrackIid($trackIid);
        }
        $resp = $this->execute($req, $sessionKey);

        print_r($resp);
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
        if (isset($resp['code'])) {
            $res = array(
                'ok' => 0,
                'msg' => $resp['msg'],
            );
        } else {
            if (isset($resp['items']['item'])) {
                $res = array(
                    'ok' => 1,
                    'list' => $resp['items']['item'],
                );
            } else {
                $res = array(
                    'ok'   => 1,
                    'list' => $resp,
                );
            }
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
        $page_size = 10;
        $res       = array();
        $req->setPageSize($page_size);
        do {
            $req->setPageNo($page);
            $resp = $this->execute($req, $sessionKey);
            // echo count($resp['items']['item']), '<br />';
            // sleep(2);
            if (!empty($resp['items']['item'])) {
                if (isset($resp['items']['item'][0])) {
                    $res = array_merge($res, $resp['items']['item']);
                } else {
                    $res[] = $resp['items']['item'];
                }
            }
            $total_record = $resp['total_results'];
            // $total_record = $resp->total_results;
            $total_page   = ceil($total_record / $page_size);
            $page ++;
            usleep(500);
        } while ($page <= $total_page);

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
        $res       = array();
        $req->setPageSize($page_size);
        do {
            $req->setPageNo($page);
            $resp = $this->execute($req, $sessionKey);
            // echo count($resp['items']['item']), '<br />';
            // sleep(2);
            if (!empty($resp['items']['item'])) {
                if (isset($resp['items']['item'][0])) {
                    $res = array_merge($res, $resp['items']['item']);
                } else {
                    $res[] = $resp['items']['item'];
                }
            }
            $total_record = $resp['total_results'];
            // $total_record = $resp->total_results;
            $total_page   = ceil($total_record / $page_size);
            $page ++;
            usleep(500);
        } while ($page <= $total_page);

        return $res;
    }
}

