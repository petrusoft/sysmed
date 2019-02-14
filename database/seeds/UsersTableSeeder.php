<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'lvelasco@dipaso.com.ec',
            'email_verified_at' => now(),
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
        ]);
    }
}
