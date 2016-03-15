<?php
function sy_exec($cmd)
{
	$ssh = new \phpseclib\Net\SSH2('127.0.0.1', 51991);
	if(!$ssh->login('sypanel', env('SYPANEL_SECRET', ''))){
		return 'Login Failed!';
	}
	$output = $ssh->exec('sudo '. $cmd);
	$ssh->disconnect();
	return $output;
}