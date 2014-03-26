<?php

return array_replace_recursive(
	array(
		'setting' => array(
			'site_name'    => 'OK管家网',
			'site_domain'  => 'www.shopiz.cn',
		),
		'assign' => array(
			'domain'       => 'shopiz.cn',
			'okgj_url'     => 'http://www.shopiz.cn/',
			'passport_url' => 'http://u.shopiz.cn/',
			'static_url'   => 'http://static.shopiz.cn/',
		),
	),
	include __DIR__ . "/environ/" . ENVIRON . ".php"
);
