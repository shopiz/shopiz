<?php
namespace Import;

class TaobaoController extends \BaseController
{

    public function indexAction()
    {

     //    $sessionKey = '6101607b08b33df1a4da9bc126d6784fd4f8f1136506caa2074082786';
     //    $userNick   = 'sandbox_c_1';

    	// // $shop = new \Taobao\Shop();
    	// $items = new \Taobao\Shop\Items();


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



        // $category = new \Taobao\Shop\Category();
        // $categoryList = $category->getCategoryList($userNick);
        // print_r($categoryList);exit;


        // $category->getShopCategoryList();

        // $categoryInfo = array(
        //     'name' => '测试类目',
        //     'pic_url' => '',
        //     'parent_cid' => 0,
        //     'sort_order' => 0,
        // );
        // $category->addCategory($sessionKey, $categoryInfo);


        // $categoryInfo = array(
        //     'cid' => 410139930,
        //     'name' => '测试类目',
        //     'pic_url' => '',
        //     'sort_order' => 0,
        // );
        // $category->updateCategory($sessionKey, $categoryInfo);

        // $category = new \Taobao\Category();
        // // $category->getAuthorizeCategoryList($sessionKey);
        // // exit;

        // $category->getItemCategoryList(0);


        // $params = array(
        //     'cid' => 50012081,
        // );
        // $category->getItemPropList($sessionKey, $params);

        // exit;
    }

    public function categoryAction()
    {
        $category = new \Taobao\Category();

        $parent_cids = array(0);
        do {
            $cids = array();
            foreach ($parent_cids as $parent_cid) {
                $category_list = $category->getItemCategoryList($parent_cid);

                if ($category_list['status'] == 1) {
                    foreach ($category_list['result'] as $k => $v) {
                        $sql = "INSERT INTO taobao_category(cid, parent_cid, name, is_parent, status, sort_order, lasttime)
                                VALUES(:cid, :parent_cid, :name, :is_parent, :status, :sort_order, :lasttime)
                                ON DUPLICATE KEY UPDATE parent_cid=:parent_cid, name=:name, is_parent=:is_parent, status=:status, sort_order=:sort_order, lasttime=:lasttime";

                        $params = array(
                                ':cid' => $v['cid'],
                                ':parent_cid' => $v['parent_cid'],
                                ':name' => $v['name'],
                                ':is_parent' => $v['is_parent'],
                                ':status' => $v['status'],
                                ':sort_order' => $v['sort_order'],
                                ':lasttime' => $_SERVER['REQUEST_TIME'],
                            );
                        $this->db->query($sql, $params);

                        if ($v['is_parent'] == 'true') {
                            $cids[] = $v['cid'];
                        }
                    }
                }
            }

            $parent_cids = $cids;
        } while (!empty($parent_cids));


        echo "success";exit;
    }

}

