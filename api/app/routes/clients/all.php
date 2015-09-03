<?php

use lalocespedes\Models\Clients;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/', function() use($app) {

  $page = $app->request()->get('pageNumber');
  $limit = $app->request()->get('pageSize');
  $q = $app->request()->get('query');

  $results = new StdClass;
  $results->page = $page;
  $results->limit = $limit;
  $results->totalItems = 0;
  $results->items = array();

  $users = Capsule::table('clients')->where('name', 'LIKE', '%'. $q .'%')->skip($limit * ($page - 1))->take($limit)->get();

  $results->Count = (isset($q)) ? count($users) : Capsule::table('clients')->count();
  $results->Items = $users;

  //$data = Clients::all();
  $response = $app->response();
  $response->header('Access-Control-Allow-Origin', '*');
  $response->write(json_encode($results));
	//echo json_encode($data);

})->name('clients.all');
