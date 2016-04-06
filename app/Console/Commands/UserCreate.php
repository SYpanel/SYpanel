<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;

class UserCreate extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'make:user {username} {password}';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Create a new user';

	/**
	 * Create a new command instance.
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 * @return mixed
	 */
	public function handle()
	{
		$username = $this->argument('username');
		$password = $this->argument('password');

		Account::create([
            'username' => $username,
            'password' => bcrypt($password),
						]);
	}
}
