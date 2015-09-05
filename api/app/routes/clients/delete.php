<?php

use lalocespedes\Models\Clients;

$app->delete('/clients/:id', function($id) use($app) {

    $client = Clients::find($id);

    if($client) {

      $client->delete();

      $return = [

        'message' => 'Cliente borrado'

      ];

    } else {

      $return = [

        'message' => 'Registro no encontrado'

      ];

    }

  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($return));

})->name('client.delete');
