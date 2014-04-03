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

    public function propAction()
    {
        $cid = $this->dispatcher->getParam(0, 'int', 0);
        // echo $cid;exit;

        $category = new \Taobao\Category();

        $propList = $category->getPropList($cid);

        $this->view->setVar('prop_list', $propList);
    }

}

