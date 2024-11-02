<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

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
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => 'test',
            'user_name' => 'test name',
            'user_tel' => '0123456789',
            'user_post' => 'test post',
            'user_address' => 'test address',
            'image' => 'testimage',
            'profile' => 'testprofile',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
