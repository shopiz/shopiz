<?php
namespace Import\Taobao;

class ShopController extends \BaseController
{

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

    }

}

