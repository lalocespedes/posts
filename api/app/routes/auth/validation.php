<?php

$validation = function($request) use($app) {

  $email = (isset($request->email)) ? $request->email : '';
  $username = (isset($request->username)) ? $request->username : '';
  $password = (isset($request->password)) ? $request->password : '';
  $passwordConfirm = (isset($request->password_confirm)) ? $request->password_confirm : '';


  $v->validate([
    'email'	=> [$email, 'required|email|uniqueEmail'],
    'username'	=> [$username, 'required|alnumDash|max(20)|uniqueUsername'],
    'password'	=> [$password, 'required|min(6)'],
    'password_confirm'	=> [$passwordConfirm, 'required|matches(password)'],
  ]);

};
