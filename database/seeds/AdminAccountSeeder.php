<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAccountSeeder extends Seeder
{
    /**
     * Insert one admin account with the following credentials
     * Username: admin
     * Email: admin@justduit.com
     * Password: 123456
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "admin",
            "email" => "admin@justduit.com",
            "password" => Hash::make("123456"),
            "role" => "ADMIN"
        ]);
    }
}
