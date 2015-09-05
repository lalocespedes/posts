<?php

use lalocespedes\Models\Clients;

require 'validation.php';

$app->post('/clients', function() use($app, $validation) {

    $request = json_decode($app->request()->getBody());

    $v = $validation($request);

    if ($v->passes()) {

      $request = get_object_vars($request);

      $client = Clients::create($request);

      $app->response->setStatus(200);

      $return = [

        'message' => 'Cliente guardado'

      ];

    } else {

      $app->response->setStatus(400);
      $return = [

        'message' => 'Error'

      ];

    }

    $response = $app->response();
    $response->write(json_encode($return));


})->name('clients.add');
