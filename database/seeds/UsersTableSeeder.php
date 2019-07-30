<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'user_login'		=> 'admin',
        	'name'			    => 'Jem Sayre',
        	'email'				=> 'jem07.say@gmail.com',
        	'password'			=> Hash::make('a123b123'),
        	'user_status'		=> 'admin', //administrator
        	'remember_token'	=> str_random(10)
        ]);
    }
}
