<?php

class DefaultController extends BaseController
{
    public function initialize()
    {
        parent::initialize();

        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_LAYOUT);
    }

    public function indexAction()
    {
    	// $this->flash->success("Your information were stored correctly!");
        
        // if ($this->session->isLogin) {
        //     $this->response
        //         ->redirect('home/index', true);
        // } else {
        //     $this->response
        //         ->redirect("default/login");
        // }
            $this->response
                ->redirect('http://www.baidu.com', true);
        // echo $this->getDi()->get('url')->getBaseUri();

        exit;
    }

    public function loginAction()
    {

    }

}

