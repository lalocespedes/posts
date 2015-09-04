<?php

use lalocespedes\Models\Clients;

$app->delete('/clients/:id', function($id) use($app) {

  $client = Clients::find($id);

  $client->delete();

  $return = [

    'message' => 'Cliente borrado'

  ];

  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($return));

})->name('client.delete');
