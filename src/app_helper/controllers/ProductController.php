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

        $this->view->op_type      = 'insert';
        $this->view->product_info = $product_info;

    }

    public function editAction()
    {
        $product_id = $this->request->getQuery('product_id', 'int', 0);
        if ($product_id <= 0) {
            exit;
        }

        $product_info = Products::inst()->getProductInfo($product_id);

        // print_r($product_info);exit;
        $this->view->op_type      = 'insert';
        $this->view->product_info = $product_info;

        // $this->view->render('add');
    }

    public function saveAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $op_type = $this->request->getPost('op_type', 'string', 'update');
            $product_id = $this->request->getPost('product_id', 'int', 0);
            $product_name = $this->request->getPost('product_name', 'string');
            $product_sn = $this->request->getPost('product_sn', 'string');
            $category_id = $this->request->getPost('category_id', 'int', 0);
            $brand_id = $this->request->getPost('brand_id', 'int', 0);
            $product_description = $this->request->getPost('product_description', 'string', '');
            $product_price = $this->request->getPost('product_price', 'float', '0.00');
            $market_price = $this->request->getPost('market_price', 'float', '0.00');
            $flag = $this->request->getPost('flag');
            $is_on_sale = $this->request->getPost('is_on_sale', 'int', 0);

            // print_r($this->db);
            if ($op_type == 'insert') {
                $columns = array(
                    'product_name' => $product_name,
                    'product_sn' => $product_sn,
                    'category_id' => $category_id,
                    'brand_id' => $brand_id,
                    'product_description' => $product_description,
                    'product_price' => $product_price,
                    'market_price' => $market_price,
                    'is_on_sale' => $is_on_sale,
                );
                $this->db->insert('products', $columns);
            } else {
                $columns = array(
                    'product_name' => $product_name,
                    'product_sn' => $product_sn,
                    'category_id' => $category_id,
                    'brand_id' => $brand_id,
                    'product_description' => $product_description,
                    'product_price' => $product_price,
                    'market_price' => $market_price,
                    'is_on_sale' => $is_on_sale,
                );
                Products::inst()->update($columns, array('conditions' => 'product_id=:product_id:', 'bind' => array('product_id' => $product_id)));
                // $this->db->insert('products', array_values($columns), array_keys($columns));
            }

            echo $product_id;
            echo $product_name;
            exit;
        }
    }

}

