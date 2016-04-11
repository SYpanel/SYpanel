<?php


namespace App\SYPanel\PAMAuth;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
	public $username;

	/**
	 * User constructor.
	 *
	 * @param array $credentials
	 */
	public function __construct($credentials)
	{
		$this->username = $credentials['username'];
	}
}