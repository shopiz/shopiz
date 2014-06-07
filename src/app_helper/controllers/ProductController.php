<?php

class ProductController extends BaseController
{

    public function indexAction()
    {
        $products = new Products();
        $products->getProductList();

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

