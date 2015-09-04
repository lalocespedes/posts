<?php

use lalocespedes\Models\Clients;

$app->put('/clients/:id', function($id) use($app) {

  $request = json_decode($app->request()->getBody());

  $request = get_object_vars($request);

  $client = Clients::find($id);

  $client->update($request);

  $return = [

    'message' => 'Cliente Actalizado'

  ];

  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($return));

})->name('clients.update');
