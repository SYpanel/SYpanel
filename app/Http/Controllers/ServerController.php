<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\SYpanel\NginxConfig;
use Illuminate\Http\Request;
use Piwik\Ini\IniWriter;

class ServerController extends Controller
{
	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

	}

	public function services()
	{
		$services_raw = shell_exec('sudo service --status-all | egrep \'mysql|php|bind9|dovecot|nginx|postfix|ssh\'');
		$services_raw = explode("\n", $services_raw);

		$services = [];
		foreach($services_raw as $service)
		{
			if(preg_match('/^ \[ ([+-]) \] (.*)$/', $service, $match))
			{
				$services[$match[2]] = ($match[1] == '+' ? true : false);
			}
		}

		return view('server.services', compact('services'));
	}

	public function serviceChange(Request $request)
	{
		switch($request->action)
		{
			case 'change':
				shell_exec('sudo service ' . $request->service . ' ' . ($request->status === 'true' ? 'start' : 'stop'));
			break;

			case 'reload':
				shell_exec('sudo service ' . $request->service . ' reload');
			break;

			case 'restart':
				shell_exec('sudo service ' . $request->service . ' restart');
			break;
		}
		return ['success' => 'yes'];
	}

	public function updates()
	{
		//TODO
		shell_exec('sudo apt-get update');
		//$updates = shell_exec('sudu ');
		return view('server.updates');
	}
}
