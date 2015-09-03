<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

// set timezone for timestamps etc
date_default_timezone_set('Mexico/General');

session_cache_limiter(false);
session_start();

ini_set('display_errors', On);

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

require INC_ROOT . '/vendor/autoload.php';

	switch ($_SERVER['HTTP_HOST']) {
		case 'localhost:9000':
			$env = 'development';
		break;
		default:
			$env = 'production';
		break;
	}

define('ENVIRONMENT', $env);

$app = new Slim([
	'mode'	=> ENVIRONMENT,
	'view'	=> new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->configureMode($app->config('mode'), function() use ($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'routes.php';

$view = $app->view();

$view->parseOptions = [
	'charset'	=> 'utf-8',
	'auto_reload' => true,
  'strict_variables' => false,
  'autoescape' => true,
	'debug'		=> $app->config->get('twig.debug')
];

$view->parserExtensions = [
	new TwigExtension
];
