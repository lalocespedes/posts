<?php

$app->get('/', function() use($app) {

	//$app->render('home.twig');

  //require 'migration.php';

  echo "home";

})->name('home');
