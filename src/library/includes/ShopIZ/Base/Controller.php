<?php

namespace ShopIZ\Base;

class Controller extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		if (isset($this->config['assign'])) {
			foreach ($this->config['assign'] as $key => $value) {
				$this->view->setVar($key, $value);
			}
		}
		if (isset($this->config['setting'])) {
			foreach ($this->config['setting'] as $key => $value) {
				$this->view->setVar($key, $value);
			}
		}

		$cityInfo = new \stdClass();
		$cityInfo->city_id    = 1;
		$cityInfo->city_name  = "深圳站";
		$cityInfo->themes_dir = "shenzhen";

		// $this->view->setOptions($cityInfo);

		$this->view->setVar('city_info', $cityInfo);
		$this->view->setVar('page', $this->dispatcher->getActionName());
	}
}
