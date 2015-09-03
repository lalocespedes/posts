<?php

use lalocespedes\Models\Clients;


$app->get('/add-manual', function() use($app) {

      $array = [

        'name' => 'Eduardo',
        'tax_id' => 'CECE780416PV6'

      ];

      Clients::create($array);

      echo "Guardado";

});

$app->post('/', function() use($app) {

    $request = json_decode($app->request()->getBody());

    $request = get_object_vars($request);

    $client = Clients::create($request);

    echo "guardado";

})->name('clients.add');
