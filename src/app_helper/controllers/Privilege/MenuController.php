<?php

namespace Privilege;

class MenuController extends \BaseController
{

    public function indexAction()
    {
        $privilege_menu = new \Privilege\Menu();

        $menuList = $privilege_menu->getMenuList(0, 2);

        // print_r($menuList);exit;

        $this->view->setVar('menu_list', $menuList);

    }

}

