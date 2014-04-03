<?php

namespace Taobao;

class CategoryController extends \BaseController
{

    public function indexAction()
    {
        $category = new \Taobao\Category();

        $categoryList = $category->getCategoryList(0, 2);

        // print_r($categoryList);exit;

        $this->view->setVar('category_list', $categoryList);

    }

}

