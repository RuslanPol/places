<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'admin',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::create([
            'login' => 'user1',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
