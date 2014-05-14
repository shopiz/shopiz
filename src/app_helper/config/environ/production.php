<?php

return array(
    'database' => array(
        "adapter"     => "Mysql",
        "host"        => "172.16.30.210",
        "username"    => "shopiz",
        "password"    => "4QLizqJEYIMFI&spPu!TVvzHmIA2m!LS",
        "dbname"      => "shopiz",
        "charset"     => "utf8",
    ),
    'application' => array(
        'showErrors'     => true,
        'baseUri'        => '/',
    ),
    'api' => array(
        'taobao' => array(
            'format' => 'json',
            'gatewayUrl' => 'http://gw.api.taobao.com/router/rest',
        ),
    ),
);
