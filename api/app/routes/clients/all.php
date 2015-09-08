<?php

use lalocespedes\Models\Clients;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;


  function filter ($id) {


      if ($id) {

        $results = Clients::find($id);

        echo json_encode($results);
        exit;

      }

	};

$app->get('/clients(/:id)', 'APIrequest', function($id=null) use($app) {

  filter($id);

  $page = $app->request()->get('pageNumber');
  $limit = $app->request()->get('pageSize');
  $q = $app->request()->get('query');

  $results = [];
  $results['page'] = (int)$page;
  $results['limit'] = (int)$limit;

  $users = Capsule::table('clients')
    ->where('name', 'LIKE', '%'. $q .'%')
    ->orWhere('tax_id', 'LIKE', '%'. $q .'%')
    ->skip($limit * ($page - 1))
    ->take($limit)
    ->get();

  $results['Count'] = Capsule::table('clients')
    ->where('name', 'LIKE', '%'. $q .'%')
    ->orWhere('tax_id', 'LIKE', '%'. $q .'%')
    ->count();
  $results['Items'] = $users;

  $app->render(200, $results);


})->name('clients.all');

$app->get('/clients/filter/id', function($id) use($app) {

  echo "results filter";

})->name('clients.filter');
