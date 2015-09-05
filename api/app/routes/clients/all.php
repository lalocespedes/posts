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


$app->get('/clients(/:id)', function($id=null) use($app) {

  filter($id);

  $page = $app->request()->get('pageNumber');
  $limit = $app->request()->get('pageSize');
  $q = $app->request()->get('query');

  $results = new StdClass;
  $results->page = $page;
  $results->limit = $limit;

  $users = Capsule::table('clients')->where('name', 'LIKE', '%'. $q .'%')->skip($limit * ($page - 1))->take($limit)->get();

  $results->Count = (isset($q)) ? count($users) : Capsule::table('clients')->count();
  $results->Items = $users;

  //$data = Clients::all();
  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($results));
	//echo json_encode($data);

})->name('clients.all');

$app->get('/clients/filter/id', function($id) use($app) {

  echo "results filter";

})->name('clients.filter');
