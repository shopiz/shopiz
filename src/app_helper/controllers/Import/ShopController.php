<?php
namespace Import;

class ShopController extends \BaseController
{
    public function initialize()
    {
        parent::initialize();

        $this->userInfo = array(
            'user_id'     => 10001,
            'shop_id'     => 10001,
            'user_nick'   => 'n百万',
            'session_key' => '6101923c8e08ae018deae939495ff5d1c38f3a219f0200584436708',
        );
        // $userInfo = array(
            // 'user_id'     => 10002,
            // 'shop_id'     => 10002,
            // 'user_nick'   => 'hyz203344',
            // // 'session_key' => '6101923c8e08ae018deae939495ff5d1c38f3a219f0200584436708',
        // );
    }

    public function indexAction()
    {
    	// $shop = new \Taobao\Shop();
    	// $items = new \Taobao\Shop\Items();


        $sessionKey = '61006068a9ac101153eccc0839127cccf50ef4d08fe2ff62074082786';
        $userNick   = 'sandbox_c_1';


        // $item_list = $items->getInventoryList($sessionKey);
        // print_r($item_list);
        // exit;

        // $item_list = $items->getOnsaleList($sessionKey);
        // print_r($item_list);
        // exit;

        // $item_info = $items->getItemInfo($sessionKey, 2100508935783);
        // print_r($item_info);
        // exit;

        // $item_list = $items->getMultiItemInfo($sessionKey, '2100509624052,2100505125288,2100503045831');
        // print_r($item_list);
        // exit;



        $category = new \Taobao\Shop\Category();
        $categoryList = $category->getCategoryList($userNick);
        print_r($categoryList);exit;


        // $category->getShopCategoryList();

        // $categoryInfo = array(
        //     'name' => '测试类目',
        //     'pic_url' => '',
        //     'parent_cid' => 0,
        //     'sort_order' => 0,
        // );
        // $category->addCategory($sessionKey, $categoryInfo);


        $categoryInfo = array(
            'cid' => 410139930,
            'name' => '测试类目',
            'pic_url' => '',
            'sort_order' => 0,
        );
        $category->updateCategory($sessionKey, $categoryInfo);


        exit;
    }

    public function categoryAction()
    {

        $category = new \Api\Taobao\Shop\Category();
        $categoryList = $category->getCategoryList($this->userInfo['user_nick']);

        // print_r($categoryList);
        foreach ($categoryList['items'] as $k => $v) {
            $sql = "INSERT INTO taobao_shop_category(user_id, cid, parent_cid, name, sort_order, pic_url, type, dateline, lasttime)
                    VALUES(:user_id, :cid, :parent_cid, :name, :sort_order, :pic_url, :type, :dateline, :lasttime)
                    ON DUPLICATE KEY UPDATE parent_cid=:parent_cid, name=:name, sort_order=:sort_order, pic_url=:pic_url, type=:type, lasttime=:lasttime";

            $params = array(
                    ':user_id' => $this->userInfo['user_id'],
                    ':cid' => $v['cid'],
                    ':parent_cid' => $v['parent_cid'],
                    ':name' => $v['name'],
                    ':sort_order' => $v['sort_order'],
                    ':pic_url' => json_encode($v['pic_url']),
                    ':type' => $v['type'],
                    ':dateline' => $_SERVER['REQUEST_TIME'],
                    ':lasttime' => $_SERVER['REQUEST_TIME'],
                );
            $this->db->query($sql, $params);
        }
    }

    public function inventoryAction()
    {

        $items = new \Api\Taobao\Shop\Items();
        $item_list = $items->getInventoryList($this->userInfo['session_key']);
        print_r($item_list);
        exit;
        foreach ($categoryList['items'] as $k => $v) {
            $sql = "INSERT INTO taobao_shop_goods(user_id, cid, parent_cid, name, sort_order, pic_url, type, dateline, lasttime)
                    VALUES(:user_id, :cid, :parent_cid, :name, :sort_order, :pic_url, :type, :dateline, :lasttime)
                    ON DUPLICATE KEY UPDATE parent_cid=:parent_cid, name=:name, sort_order=:sort_order, pic_url=:pic_url, type=:type, lasttime=:lasttime";

            $params = array(
                    ':user_id' => $this->userInfo['user_id'],
                    ':cid' => $v['cid'],
                    ':parent_cid' => $v['parent_cid'],
                    ':name' => $v['name'],
                    ':sort_order' => $v['sort_order'],
                    ':pic_url' => json_encode($v['pic_url']),
                    ':type' => $v['type'],
                    ':dateline' => $_SERVER['REQUEST_TIME'],
                    ':lasttime' => $_SERVER['REQUEST_TIME'],
                );
            $this->db->query($sql, $params);
        }

        // $item_info = $items->getItemInfo($this->userInfo['session_key'], 2100508935783);
        // print_r($item_info);
        // exit;

        // $item_list = $items->getMultiItemInfo($this->userInfo['session_key'], '2100509624052,2100505125288,2100503045831');
        // print_r($item_list);
        // exit;
    }



    public function stockAction()
    {

        $items = new \Api\Taobao\Shop\Items();
        $item_list = $items->getOnsaleList($this->userInfo['session_key']);
        // print_r($item_list);
        // exit;
        $num_iids = array();
        foreach ($item_list as $k => $v) {
            $num_iids[] = $v['num_iid'];
            // $sql = "SELECT id FROM taobao_shop_goods WHERE shop_id=:shop_id AND num_iid=:num_iid";
            // $params = array(
            //     'shop_id' => $this->userInfo['shop_id'],
            //     'num_iid' => $v['num_iid'],
            // );

            // $goods_info = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, $params);
            // if (empty($goods_info)) {
            //     $sql = "INSERT INTO products(product_name, product_price, dateline, lasttime)
            //             VALUES(:product_name, :product_price, :dateline, :lasttime)";
            //     $params = array(
            //         ':product_name' => $v['title'],
            //         ':product_price' => $v['price'],
            //         ':dateline' => $_SERVER['REQUEST_TIME'],
            //         ':lasttime' => $_SERVER['REQUEST_TIME'],
            //     );
            //     $this->db->query($sql, $params);
            //     $product_id = $this->db->lastInsertId();
            //     $sql = "INSERT INTO user_shop_goods(shop_id, product_id, dateline, lasttime)
            //             VALUES(:shop_id, :product_id, :dateline, :lasttime)";
            //     $params = array(
            //         // 'user_id' => $this->userInfo['shop_id'],
            //         ':shop_id' => $this->userInfo['shop_id'],
            //         ':product_id' => $product_id,
            //         ':dateline' => $_SERVER['REQUEST_TIME'],
            //         ':lasttime' => $_SERVER['REQUEST_TIME'],
            //     );
            //     $this->db->query($sql, $params);
            //     $goods_id = $this->db->lastInsertId();
            // } else {
            //     $goods_id = 0;
            // }


            // $sql = "INSERT INTO taobao_shop_goods(shop_id, goods_id, num_iid, price, title, dateline, lasttime)
            //         VALUES(:shop_id, :goods_id, :num_iid, :price, :title, :dateline, :lasttime)
            //         ON DUPLICATE KEY UPDATE price=:price, title=:title, lasttime=:lasttime";

            // $params = array(
            //         ':shop_id' => $this->userInfo['shop_id'],
            //         ':goods_id' => $goods_id,
            //         ':num_iid' => $v['num_iid'],
            //         ':price' => $v['price'],
            //         ':title' => $v['title'],
            //         ':dateline' => $_SERVER['REQUEST_TIME'],
            //         ':lasttime' => $_SERVER['REQUEST_TIME'],
            //     );
            // $this->db->query($sql, $params);
        }

        // $item_info = $items->getItemInfo($this->userInfo['session_key'], 2100508935783);
        // print_r($item_info);
        // exit;

        while (count($num_iids) > 0) {
            $ids = array_splice($num_iids, 0, 20);
            $item_list = $items->getMultiItemInfo($this->userInfo['session_key'], implode(',', $ids));
            print_r($item_list);
            exit;
        }
        exit;
    }

}

