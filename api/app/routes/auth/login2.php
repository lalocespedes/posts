<?php

$app->post('/auth/login', function() use($app) {

  $request = json_decode($app->request()->getBody());

  $request = get_object_vars($request);

  $return = [

    'token' => 'token'

  ];

  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($return));

})->name('login');
