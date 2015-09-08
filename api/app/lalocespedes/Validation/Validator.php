<?php

namespace lalocespedes\Validation;

use Violin\Violin;

use lalocespedes\User\User;
use lalocespedes\Product\Product;
use lalocespedes\Helpers\Hash;

/**
*
*/
class Validator extends Violin
{
	protected $user;

	protected $hash;

	protected $auth;

	public function __construct(User $user, Hash $hash, $auth = null)
	{
		$this->user = $user;
		$this->hash = $hash;
		$this->auth = $auth;

		$this->addFieldMessages([
			'email' => [
				'uniqueEmail' => 'That email is already in use'
			],
			'username' => [
				'uniqueUsername' => 'That username is already in use'
			]
		]);

		$this->addRuleMessages([
			'matchesCurrentPassword' => 'Contrasena actual invalida'
		]);

		$this->addRuleMessages([
			'taxId' => 'RFC No valido, recuerde usar MAYUSCULAS'
		]);
		
	}

	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value);

		return ! (bool) $user->count();
	}

	public function validate_uniqueUsername($value, $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count();
	}

	public function validate_matchesCurrentPassword($value, $input, $args)
	{
		if ($this->auth && $this->hash->passwordCheck($value, $this->auth->password)) {
			return true;
		}

		return false;
	}

	public function validate_taxId($value, $input, $args)
	{
		$regex = "/^[A-ZÃ‘&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9][A-Z,0-9][0-9A]$/";
		if (preg_match($regex, $value, $result)) {
			return true;
		}
		return false;
	}

}
