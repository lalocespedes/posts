<?php

$validation = function($request) use($app) {

  $name = (isset($request->name)) ? $request->name : '';
  $tax_id = (isset($request->tax_id)) ? $request->tax_id : '';
  $email_address = (isset($request->email_address)) ? $request->email_address : '';

	$v = $app->validation;

	return $v->validate([
		'name'		=> [$name, 'required'],
		'tax_id'	=> [$tax_id, 'required|taxId'],
		'email_address'	=> [$email_address, 'email']
	]);

};
