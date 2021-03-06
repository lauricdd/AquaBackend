<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASS')),
            'role' => 'superadmin',
            'timezone' => 'America/Bogota'
        ]);
    }
}
