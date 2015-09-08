<?php

$app->get('/', function() use($app) {

	//$app->render('home.twig');

  //require 'migration.php';

  var_dump($_SESSION);

  echo "home";

})->name('home');
