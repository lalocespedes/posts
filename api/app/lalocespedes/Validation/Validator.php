<?php

namespace lalocespedes\Validation;

use Violin\Violin;


/**
*
*/
class Validator extends Violin
{

	public function __construct()
	{

		$this->addRuleMessages([
			'taxId' => 'RFC No valido, recuerde usar MAYUSCULAS'
		]);
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
