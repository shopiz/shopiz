<?php

use Phalcon\DI\FactoryDefault,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\Model\Manager as ModelManager,
	Phalcon\Mvc\View\Engine\Volt as VoltEngine,
	ShopIZ\Mvc\View\Engine\Simple as SimpleEngine,
	Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
	Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * 调试设置
 */
if ($config->application->showErrors) {
	error_reporting(E_ALL & ~E_NOTICE);
	new Whoops\Provider\Phalcon\WhoopsServiceProvider($di);
}

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
}, true);

/**
 * 设置视图
 */
$di->set('view', function() use ($config) {

	$view = new View();

	// 设置模版目录
	$view->setBasePath($config->view->baseDir);
	$view->setViewsDir($config->view->themeDir);

    // 设置布局
    $view->setMainView($config->view->mainView);
    $view->setLayoutsDir($config->view->layoutDir);
    // $view->setLayout($config->view->layoutFile);

    // 注册模版解析引擎
	$view->registerEngines(array(
		'.html' => 'Phalcon\Mvc\View\Engine\Php',
		'.volt' => function($view, $di) use ($config) {

			$volt = new VoltEngine($view, $di);

			$volt->setOptions(array(
				'compileAlways'     => $config->view->compileAlways,
				'compiledPath'      => $config->view->compiledDir,
				'compiledSeparator' => '_'
			));

			return $volt;
		},
		'.dwt' => function($view, $di) use ($config) {

			$simple = new SimpleEngine($view, $di);

			$simple->setOptions(array(
					'app_name'           => $config->view->appName,
					'base_dir'           => $config->view->baseDir,
					'cache_time'         => $config->view->cacheTime,
					'template_dir'       => $config->view->themeDir,
					'cache_dir'          => $config->view->cacheDir,
					'compile_dir'        => $config->view->compiledDir,
					// 'default_themes_dir' => $config->view->defaultThemesDir,
				)
			);

			return $simple;
		},
	));

	// $eventsManager = new Phalcon\Events\Manager();
	// $layoutEvent = new ShopIZ\Event\Layout();
	// $eventsManager->attach('view', $layoutEvent);
	// $view->setEventsManager($eventsManager);

	return $view;
}, true);

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function(){
    $flash = new \Phalcon\Flash\Direct(array(
        'error' => 'alert alert-error',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
    ));
    return $flash;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function() use ($config) {
	return new DbAdapter(array(
		'host' => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname' => $config->database->dbname,
		'charset' => $config->database->charset,
	));
});

$di->set('modelsManager', function() {
      return new ModelManager();
 });

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function() {
	return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
	$session = new SessionAdapter();
	$session->start();

	return $session;
});

$di->set('router', function(){

    $router = new \Phalcon\Mvc\Router();

    $router->setDefaultController('default');

    $router->add(
    	"/:namespace/:controller/:action/:params",
    	array(
    		'namespace'   => 1,
    		'controller'  => 2,
    		'action'      => 3,
    		'params'      => 4,
    	)
    );

    return $router;
}, true);

