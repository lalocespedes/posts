<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;
use RandomLib\Factory as Randomlib;

use lalocespedes\User\User;
use lalocespedes\Helpers\Hash;
use lalocespedes\Validation\Validator;
use lalocespedes\Mail\Mailer;

use lalocespedes\Middleware\MYBeforeMiddleware;

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

$app->add(new MYBeforeMiddleware);

$app->configureMode($app->config('mode'), function() use ($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'filters.php';
require 'routes.php';

$app->auth = false;

$app->container->set('user', function() {
	return new User;
});

$app->container->singleton('randomlib', function() use($app) {
	$factory = new RandomLib;
	return $factory->getMediumStrengthGenerator();
});

$app->container->singleton('hash', function() use($app) {
	return new Hash($app->config);
});

// $app->container->singleton('validation', function() use($app) {
// 	return new Validator();
// });

$app->container->singleton('validation', function() use($app) {
	return new Validator($app->user, $app->hash, $app->auth);
});

$app->container->singleton('mail', function() use($app) {

	$mailer = new PHPMailer;
	$mailer->IsSMTP();
	$mailer->Host = $app->config->get('mail.host');
	$mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
	$mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
	$mailer->Port = $app->config->get('mail.port');
	$mailer->Username = $app->config->get('mail.username');
	$mailer->Password = $app->config->get('mail.password');

	$mailer->isHTML($app->config->get('mail.html'));

	return new Mailer($app->view, $mailer);

});

$view = $app->view();

$app->view()->appendData([
 		'baseUrl'	=> $app->config->get('app.url')
]);

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
