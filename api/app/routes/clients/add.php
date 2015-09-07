<?php

use lalocespedes\Models\Clients;

require 'validation.php';

$app->post('/clients', function() use($app, $validation) {

    $request = json_decode($app->request()->getBody());

    $request->tax_id = strtoupper($request->tax_id);

    $v = $validation($request);

    if ($v->passes()) {

      $request = get_object_vars($request);

      $client = Clients::create($request);

      $app->response->setStatus(200);

      $return = [

        'message' => 'Cliente guardado'

      ];

    } else {

      $verrors = $v->errors();

      $errors = [];

      foreach ($verrors->keys() as $key) {
          if ($verrors->has($key)) {
              $errors[$key] = $verrors->get($key);
          }
      }

      $app->response->setStatus(400);

      $return = [

        'message' => 'Error',

        'errors' =>  $errors

      ];

    }

    $response = $app->response();
    $response->write(json_encode($return));


})->name('clients.add');
