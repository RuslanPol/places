<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
//        User::factory()->create([
//            'name'=>'kuzia',
//            'email' => 'kuzia@gmail.com',
//            'password' => Hash::make('password'),
//            'is_admin' => false,
//        ]);
//
//        User::factory()->create([
//            'name'=>'vasia',
//            'email' => 'vasia@gmail.com',
//            'password' => Hash::make('password'),
//            'is_admin' => false,
//        ]);
        User::factory(5)->create();
    }
}
