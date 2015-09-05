<?php

$app->post('/auth/login', function() use($app) {

  $request = json_decode($app->request()->getBody());

  $request = get_object_vars($request);

  var_dump($request);

  return true;

})->name('login');
