<?php

function createToken($user)
{

	$payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + (2 * 7 * 24 * 60 * 60)
        ];

	return JWT::encode($payload, 6575677656756767567);

}


$app->post('/auth/login','APIrequest', function() use($app) {

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

			$app->render(200, [
				'token' => createToken($user)
			]);

		} else {

				$app->render(500, [
					'error' => TRUE,
        	'msg'   => 'user or password incorrect'
				]);
		}
	}

});
