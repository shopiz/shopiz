<?php
  
/** 
 * 模版类 
 * 
 * 
 * $Id: Template.php 17217 2011-01-19 06:29:08Z 
 */
namespace ShopIZ\Mvc\View\Engine;

class Simple extends \Phalcon\Mvc\View\Engine implements \Phalcon\Mvc\View\EngineInterface
{

    protected $_simple;

    protected $_params;

    public function __construct(\Phalcon\Mvc\ViewBaseInterface $view,
                                \Phalcon\DiInterface $dependencyInjector = NULL)
    {
        $this->_simple = new \ShopIZ\Mvc\View\Adapter\Simple();

        parent::__construct($view, $dependencyInjector);
    }

    public function render($path, $params, $mustClean = NULL)
    {
        if (!isset($params['content'])) {
            $params['content'] = $this->_view->getContent();
        }
        foreach($params as $key => $value){
            $this->_simple->assign($key, $value);
        }
        $this->_view->setContent($this->_simple->fetch($path));
    }

    public function setOptions($options)
    {
        foreach ($options as $k => $v) {
            $this->_simple->$k = $v;
        }
        // $this->_simple->app_name           = $options['app_name'];
        // $this->_simple->base_dir           = $options['base_dir'];
        // $this->_simple->cache_lifetime     = $options['cache_time'];
        // $this->_simple->template_dir       = $options['template_dir'];
        // $this->_simple->cache_dir          = $options['cache_dir'];
        // $this->_simple->compile_dir        = $options['compile_dir'];
        // $this->_simple->default_themes_dir = 'default';
    }

}
