<?php

use lalocespedes\Models\Clients;

require 'validation.php';

$app->put('/clients/:id', function($id) use($app, $validation) {

  $request = json_decode($app->request()->getBody());

  $v = $validation($request);

  if ($v->passes()) {

    $request = get_object_vars($request);

    $client = Clients::find($id);

    $client->update($request);

    $app->response->setStatus(200);
    $return = [

      'message' => 'Cliente Actalizado'

    ];

  } else {

    $app->response->setStatus(400);

    $return = [

      'message' => 'Error'

    ];

  }

  $response = $app->response();
  $response->write(json_encode($return));

})->name('clients.update');
