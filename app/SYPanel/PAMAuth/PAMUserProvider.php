<?php


namespace App\SYPanel\PAMAuth;


use App\Models\Account;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class PAMUserProvider extends EloquentUserProvider
{

	public function validateCredentials(UserContract $user, array $credentials)
	{
		$profile = $user instanceof Account ? $user : Account::find($user->getAuthIdentifier());

		if($profile && $profile->id == $user->getAuthIdentifier())
		{
			return static::PAMAuthenticate($profile->username, $credentials['password']);
		}

		return false;
	}


	/**
	 * PAM Authentication
	 * @link http://stackoverflow.com/a/7944446
	 *
	 * @param string $user Linux username
	 * @param string $pass Linux Password
	 *
	 * @return bool
	 */
	public static function PAMAuthenticate($user, $pass)
	{
		/** run shell command to output shadow file, and extract line for $user
		 * then split the shadow line by $ or : to get component parts
		 * store in $shad as array
		 */
		$shad = preg_split("/[$:]/", `sudo cat /etc/shadow | grep "^$user\:"`);
		/** use mkpasswd command to generate shadow line passing $pass and $shad[3] (salt)
		 * split the result into component parts and store in array $mkps
		 */
		$mkps = preg_split("/[$:]/", trim(`mkpasswd -m sha-512 $pass $shad[3]`));

		/** compare the shadow file hashed password with generated hashed password and return
		 */
		return ($shad[4] == $mkps[3]);
	}
}