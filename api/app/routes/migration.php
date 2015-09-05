<?php

use Illuminate\Database\Capsule\Manager as Capsule;


// problemas con sqlite no me permite hacer migrations

//$database = Capsule::connection()->getDatabaseName();
//touch($database);

//Capsule::disconnect($database);

//$users = Capsule::table('clients')->get();

//var_dump($users);

//exit;

$database = INC_ROOT.'/app/data/derby';

$phinx = new Phinx\Console\PhinxApplication();

$wrap = new Phinx\Wrapper\TextWrapper($phinx, [
      'configuration' => INC_ROOT.'/app/phinx.yml',
      'parser' => 'yaml',
      'name' => $database
      //'user' => 'root',
      //'pass' => 'root'
  ]);

call_user_func([$wrap, 'getMigrate']);

//$capsule->reconnect();
