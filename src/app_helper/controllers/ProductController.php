<?php

class ProductController extends BaseController
{

    public function indexAction()
    {
        $pagesize = isset($_REQUEST['pagesize']) && intval($_REQUEST['pagesize']) > 0 ? intval($_REQUEST['pagesize']) : 10;
        $products = new Products();
        $params = array(
            'limit' => $pagesize,
        );
        $product_list = $products->getProductList($params);

        $this->view->product_list = $product_list;
        $this->view->pagesize = $pagesize;
    }

    public function addAction()
    {
        $product_info = array(
            'product_id' => '',
            'product_name' => '',
            'product_price' => '0.00',
            'market_price' => '0.00',
            'category_id' => '0',
            'brand_id' => '0',
            'product_images' => array(),
            'flag' => array(),
            'is_on_sale' => 0,
        );

        $this->view->product_info = $product_info;

    }

    public function updateAction()
    {

    }

    public function saveAction()
    {

    }

}

