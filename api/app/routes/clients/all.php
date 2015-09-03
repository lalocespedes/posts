<?php

use lalocespedes\Models\Clients;

$app->get('/', function() use($app) {

  $data = Clients::all();

  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($data));
	//echo json_encode($data);

})->name('clients.all');
