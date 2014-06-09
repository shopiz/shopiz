<?php

class ProductController extends BaseController
{

    public function indexAction()
    {
        $products = new Products();
        $product_list = $products->getProductList();

        $this->view->product_list = $product_list;
    }

    public function addAction()
    {

    }

    public function updateAction()
    {

    }

    public function saveAction()
    {

    }

}

