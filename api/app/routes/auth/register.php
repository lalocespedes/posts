<?php

use lalocespedes\User\UserPermission;

require 'validation.php';

$app->post('/auth/register', $guest(), function() use($app) {

	$request = $app->request;

	$request = json_decode($app->request()->getBody());

	$v = $app->validation;

	if ($v->passes()) {

		$identifier = $app->randomlib->generateString(128);

		$request->active_hash = $app->hash->hash($identifier);
		$request->active = false;
		$request->password = $app->hash->password($request->password);

		$request = get_object_vars($request);

		$user = $app->user->create($request);

		$user->permissions()->create(UserPermission::$defaults);

		$app->mail->send('email/auth/registered.php', ['user' => $user, 'identifier' => $identifier], function($message) use($user) {

			$message->to($user->email);
			$message->subject('Gracias por registrarse');

		});

		echo "Regristrado";

		exit();
	}

	dd($v->errors());

});
