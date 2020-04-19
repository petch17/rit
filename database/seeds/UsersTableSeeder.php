<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->insert([
            [

            'titlename' => 'นาย',
            'name' => 'ผู้ดูแลระบบ',
            'lastname' => 'ควบคุม',
            'username' => 'admin',
            'phone' => '09',
            'address' => 'admin@gmail.com',
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'type' => '1'
        ]
        ,
        [

            'titlename' => 'นาย',
            'name' => 'ผู้ดูแล',
            'lastname' => 'คุม',
            'username' => 'user',
            'phone' => '00',
            'address' => 'adil.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'type' => '0'
        ]
    ]);
    }
}
