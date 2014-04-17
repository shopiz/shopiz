<?php

return array(
    'database' => array(
        "adapter"     => "Mysql",
        "host"        => "172.16.30.210",
        "username"    => "root",
        "password"    => "okgj123qwe",
        "dbname"      => "shopiz",
        "charset"     => "utf8",
    ),
    'application' => array(
        'showErrors'     => true,
        'baseUri'        => '/',
    ),
    'api' => array(
        'taobao' => array(
            'appkey' => '1021753629',
            'secretKey' => 'sandboxffa29a294085773629049d4c8',
            'format' => 'xml',
            'gatewayUrl' => 'http://gw.api.tbsandbox.com/router/rest',


            //
            //610182991666ba8a9e0d79462be616de874c018e68724c484436708
            //https://oauth.tbsandbox.com/authorize?response_type=token&client_id=21753629
            //
            //sandbox
            //session: 61006068a9ac101153eccc0839127cccf50ef4d08fe2ff62074082786
            //refresh_token: 6100c06ddca55c190ac1e4f42af7c6dbb2edd7df06e237f2074082786
        ),
    ),
);
