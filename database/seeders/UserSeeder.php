<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890'
        ]);

        User::create([
            'name' => 'Yusuf',
            'email' => 'yusuf@gmail.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567891'
        ]);
    }
}
