<?php

namespace Privilege;

class MenuController extends \BaseController
{

    public function indexAction()
    {
    	$privilege_menu = new \Privilege_Menu();

    	$menu_list = $privilege_menu->getMenuList();
    	var_dump($menu_list);exit;

    	$this->view->setVar('menu_list', $menu_list);
    }

}

