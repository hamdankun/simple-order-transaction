<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::where('username', 'superadmin')->delete();
        User::create([
        	'name' => 'Super Admin',
        	'username' => 'superadmin',
        	'email' => 'superadmin@simpleapp.com',
        	'password' => app('hash')->make('password'),
        	'role' => 1
        ]);
    }
}
