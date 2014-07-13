<?php

$loader = new \Phalcon\Loader();

/**
 * 注册自动加载目录
 */
$loader->registerDirs(
	array(
		// 应用
		APP_PATH . "controllers/",
		APP_PATH . "models/",
		APP_PATH . "includes/",
		APP_PATH . "plugins/",

		// 全局
		LIBRARY_PATH . "controllers/",
		LIBRARY_PATH . "models/",
		LIBRARY_PATH . "includes/",
		LIBRARY_PATH . "plugins/",
	)
)->register();

$loader->registerNamespaces(
	array(
		'\import' => '\Import',
		'\taobao' => '\Taobao',
	)
)->register();