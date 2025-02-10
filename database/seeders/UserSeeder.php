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
            'id' => 1,
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'phone' => '08123456789'
        ]);

        User::create([
            'id' => 2,
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'phone' => '08123456790'
        ]);
    }
}
