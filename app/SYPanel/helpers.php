<?php
function sy_exec($cmd)
{
	$ssh = new \phpseclib\Net\SSH2('127.0.0.1', 51991);
	//dd(env('SYPANEL_SECRET'));
	if(!$ssh->login('sypanel', env('SYPANEL_SECRET', '')))
	{
		return 'Login Failed!';
	}
	$output = $ssh->exec('sudo ' . $cmd);
	$ssh->disconnect();

	return $output;
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

function authenticate($user, $pass)
{
	/** run shell command to output shadow file, and extract line for $user
	 * then split the shadow line by $ or : to get component parts
	 * store in $shad as array
	 */
	$shad = preg_split("/[$:]/", `cat /etc/shadow | grep "^$user\:"`);
	/** use mkpasswd command to generate shadow line passing $pass and $shad[3] (salt)
	 * split the result into component parts and store in array $mkps
	 */
	$mkps = preg_split("/[$:]/", trim(`mkpasswd -m sha-512 $pass $shad[3]`));

	/** compare the shadow file hashed password with generated hashed password and return
	 */
	return ($shad[4] == $mkps[3]);
}