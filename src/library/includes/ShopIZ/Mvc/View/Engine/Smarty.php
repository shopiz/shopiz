<?php
  
/** 
 * 模版类 
 * 
 * 
 * $Id: Template.php 17217 2011-01-19 06:29:08Z 
 */
namespace ShopIZ\Mvc\View\Engine;

class Smarty extends \Phalcon\Mvc\View\Engine implements \Phalcon\Mvc\View\EngineInterface
{

    protected $_smarty;

    protected $_params;

    public function __construct($view, $di = NULL)
    {
        $this->_smarty = new ShopIZ\Mvc\View\Adapter\Smarty();
        $this->_smarty->template_dir = '.';
        $this->_smarty->compile_dir = SMARTY_DIR . 'templates_c';
        $this->_smarty->config_dir = SMARTY_DIR . 'configs';
        $this->_smarty->cache_dir = SMARTY_DIR . 'cache';
        $this->_smarty->caching = false;
        $this->_smarty->debugging = true;
        parent::__construct($view, $di);
    }

    public function render($path, $params, $mustClean = NULL)
    {
        if (!isset($params['content'])) {
            $params['content'] = $this->_view->getContent();
        }
        foreach($params as $key => $value){
            $this->_smarty->assign($key, $value);
        }
        $this->_view->setContent($this->_smarty->fetch($path));
    }

}
