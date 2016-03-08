<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\SYpanel\NginxConfig;
use Illuminate\Http\Request;
use Piwik\Ini\IniWriter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pool['msbyorg'] = [
            'user' => 'msbyorg',
            'group' => 'msbyorg',
            'listen' => '127.0.0.1:9001',
            'listen.owner' => 'msbyorg',
            'listen.group' => 'msbyorg',
        ];
        $ini = new IniWriter();
        echo '<pre>';
        echo $ini->writeToString($pool);
        die();

        return view('app');
    }
}
