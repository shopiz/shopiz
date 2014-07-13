<?php

return new Phalcon\Config(
    array_replace_recursive(
        array(
            'database' => array(
                "adapter"     => "Mysql",
                "host"        => "172.16.30.210",
                "username"    => "root",
                "password"    => "",
                "dbname"      => "shopiz",
                "charset"     => "utf8",
            ),
            'application' => array(
                'showErrors'       => false,
                'baseUri'          => '/',
            ),
            'view' => array(
                // 'layoutDir'        => BASE_PATH . 'views/common/',
                'themeDir'         => BASE_PATH . 'views/' . APP_NAME . '/',
                'mainView'         => 'index',
                // 'layoutFile'       => 'index',
                'appName'          => APP_NAME,
                // 'baseDir'          => BASE_PATH . 'views/',
                // 'mainView'         => '../index',
                // 'layoutDir'        => '../layouts/',
                // // 'layoutFile'       => 'frame',
                // 'themeDir'         => 'app_shop/',
                'cacheTime'        => 7200,
                'cacheDir'         => DATA_PATH . 'cache/' . APP_NAME . '/',
                'compiledDir'       => DATA_PATH . 'compiled/' . APP_NAME . '/',
                'defaultThemesDir' => 'default',
                'compileAlways'    => false,
            ),
        ),
        include __DIR__ . "/environ/" . $_SERVER['ENVIRON'] . ".php",
        include LIBRARY_PATH . "/config/common.php"
    )
);
