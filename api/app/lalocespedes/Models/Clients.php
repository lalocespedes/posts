<?php

namespace lalocespedes\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
/**
*
*/
class Clients extends Eloquent
{
	protected $table = 'clients';

	protected $fillable = [
		'name',
		'active',
		'address',
		'address2',
		'noExt',
		'noInt',
		'city',
		'state',
		'zip',
		'country',
		'phone_number',
		'mobile_number',
		'fax_number',
		'email_address',
		'web_address',
		'notes',
		'tax_id',
		'etiqueta',
		'bank',
		'bank_account',
		'iva_ret'
	];

	protected $attributes = [
		'active' => true
	];

	public function direccion()
	{
		return "{$this->address} {$this->address2} {$this->noExt} {$this->noInt}";
	}

	public function AddressComplete()
	{
		return "{$this->address} {$this->address2} {$this->noExt} {$this->noInt} {$this->city} {$this->state} {$this->country} {$this->zip}";
	}

	public function setClientNumber()
	{

		//if(!$this->client_numbere) {

			//generar numero de cleinte automatico
			//$this->attributes['slug'] = Str::slug($value);
		//}

	}

	//public function contacts()
	//{

		//return $this->HasMany('lalocespedes\Models\ClientsContacts');

	//}
}
