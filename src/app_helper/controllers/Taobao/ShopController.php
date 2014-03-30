<?php
namespace Taobao;

class ShopController extends \BaseController
{

    public function indexAction()
    {

    }

    public function categoryAction()
    {
        $category = new Category();

        $categoryList = $category->getCategoryList();
    }

}

