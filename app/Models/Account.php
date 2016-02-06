<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable = [
		'domain',
		'username',
		'email',
		'password',
		'disk_space',
		'bandwidth',
		'emails',
		'sub_domains',
		'parked_domains',
		'addon_domains',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];
}
