<?php


namespace App\SYpanel;


class NginxConfig
{
	public $location = [];

	public function __set($key, $value)
	{
		$this->{$key} = $value;
	}

	public function __get($key)
	{
		return (isset($this->{$key}) ? $this->{$key} : null);
	}
}

class Location
{
	public function __set($key, $value)
	{
		$this->{$key} = $value;
	}

	public function __get($key)
	{
		return (isset($this->{$key}) ? $this->{$key} : null);
	}
}