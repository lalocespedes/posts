<?php

$app->post('/auth/login', $guest(), function() use($app) {

	$request = $app->request;

	$request = json_decode($app->request()->getBody());

	$identifier = $request->email;
	$password = $request->password;

	$v = $app->validation;

	$v->validate([
		'identifier' => [$identifier, 'required'],
		'password' => [$password, 'required']
	]);

	if ($v->passes()) {

		$user = $app->user
			->where('active', true)
			->where(function($query) use ($identifier) {
				return $query->where('email', $identifier)
					->orWhere('username', $identifier);
			})
			->first();

		if ($user && $app->hash->passwordCheck($password, $user->password)) {

			$_SESSION[$app->config->get('auth.session')] = $user->id;

			//$_SESSON['token'] = 11111;
			$return = [

				'token' => 'token'

			];

			echo json_encode($return);

			exit();

		} else {

			echo 'Error login';
			exit();
		}
	}

	//dd($v->errors());

});
