<?php

$app->get('/', function() use($app) {

	//$app->render('home.twig');

  echo "home";

})->name('home');
