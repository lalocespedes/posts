<?php

return [
	'app' 	=> [
		'url'	=> 'http://localhost:9000',
		'hash'	=> [
			'algo'	=> PASSWORD_BCRYPT,
			'cost'	=> 10
		],
		'debug'	=> true
	],
	'db' 	=> [
		'driver' 	=> 'sqlite',
		'host'		=> 'localhost',
		'name'		=>  INC_ROOT . '/app/data/derby',
		'username'	=> 'root',
		'password'	=> 'root',
		'charset'	=> 'utf8',
		'collation'	=> 'utf8_unicode_ci',
		'prefix'	=>	''
	],
	'auth'	=> [
		'session'	=> 'user_id',
		'remember'	=> 'user_r'
	],
	'mail'	=> [
		'smtp_auth'		=> true,
		'smtp_secure'	=> 'tls',
		'host' 			=> 'smtp.gmail.com',
		'username'		=> 'lalocespedes@gmail.com',
		'password'		=> '',
		'port'			=> 587,
		'html'			=> true
	],
	'twig'	=> [
		'debug'	=> true
	],
	'csrf'	=> [
		'key'	=> 'csrf_token'
	]
];
