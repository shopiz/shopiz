<?php

class ShopController extends BaseController
{

    public function indexAction()
    {
        $s = microtime(true);
        $shop_id = 10000;
        
        // $shop = new Shop();
        // $shop->getShopList(array('keyword' => '州'));
        // $shop_info = $shop->getShopInfo($shop_id);
        // print_r($shop_info);


        // $sql = "SELECT shop_id, shop_name, enabled, lasttime, dateline
        //         FROM ok_shop
        //         WHERE shop_id=:shop_id AND is_delete=0";
        // $stmt = $this->db->prepare($sql);
        // $stmt->bindValue(':shop_id', $shop_id);
        // $stmt->execute();
        // $shopInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        

        // $sql = "SELECT shop_id, shop_name, enabled, lasttime, dateline
        //         FROM ok_shop
        //         WHERE shop_id=:shop_id AND is_delete=0";
        // $shop_info = Shop::query()
        //         ->where('shop_id=:shop_id:')
        //         ->bind(array('shop_id' => $shop_id))
        //         // ->getQuery()
        //         ->execute();
                
        // $shop_info = Shop::query()
        //     ->inWhere('shop_id', array($shop_id))
        //     // ->getPhql();
        //     ->execute();
        // // echo $shop_info;exit;

        // foreach($shop_info as $shop) {
        //     print_r($shop->shop_name);
        // }

        // print_r($this->modelsManager);

        // $shop_info = Shop::findFirst($shop_id);
        // // echo $shop_info->shop_name;
        

        // $sql = "SELECT shop_id, shop_name, enabled, lasttime, dateline
        //         FROM ok_shop
        //         WHERE shop_id=:shop_id AND is_delete=0";
        // $shop_info = $this->db->fetchOne($sql, Phalcon\Db::FETCH_ASSOC, array('shop_id'=>$shop_id));
        // // echo $shop_info['shop_name'];
        
        echo microtime(true) - $s;
        exit;
    }

}

