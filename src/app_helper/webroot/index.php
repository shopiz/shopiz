<?php

error_reporting(E_ALL);

try {
	// 应用名称
	define('APP_NAME', 'app_helper');
    /**
     * 环境
     * 可选值：production, develop, test
     */
	define('ENVIRON', 'production');

    define("DS", DIRECTORY_SEPARATOR);

    define("APP_PATH", dirname(__DIR__) . DS);

    define("BASE_PATH", dirname(APP_PATH) . DS);

    define("LIBRARY_PATH", BASE_PATH . "library" . DS);

    define("DATA_PATH", BASE_PATH . "data" . DS);

	/**
	 * Read the configuration
	 */
	$config = include __DIR__ . "/../config/config.php";

	/**
	 * Read auto-loader
	 */
	include __DIR__ . "/../config/loader.php";

	/**
	 * Read services
	 */
	include __DIR__ . "/../config/services.php";

	$di->set('config', $config);

	/**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application($di);

	echo $application->handle()->getContent();

} catch (\Exception $e) {
	echo $e->getMessage();
}
