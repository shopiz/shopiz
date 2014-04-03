<?php

namespace Taobao;

class PropertyController extends \BaseController
{

    public function indexAction()
    {
        $cid = $this->dispatcher->getParam(0, 'int', 0);
        // echo $cid;exit;

        $category = new \Taobao\Category();

        $propList = $category->getPropList($cid);

        $this->view->setVar('prop_list', $propList);
    }

}

