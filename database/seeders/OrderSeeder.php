<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Pastikan user sudah ada sebelum memasukkan order
        $userExists = DB::table('users')->count();
        if ($userExists == 0) {
            $this->call(UserSeeder::class);
        }

        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'menu_id' => 2,
                'quantity' => 1,
                'unit_price' => 25000,
                'total_amount' => 25000,
                'payment_method' => 'Cash',
                'order_time' => Carbon::now()->subMinutes(10),
                'notes' => 'Tanpa sambal'
            ],
            [
                'user_id' => 2,
                'menu_id' => 5,
                'quantity' => 2,
                'unit_price' => 15000,
                'total_amount' => 30000,
                'payment_method' => 'E-Wallet',
                'order_time' => Carbon::now()->subMinutes(30),
                'notes' => 'Tambah saus ekstra'
            ],
            [
                'user_id' => 3,
                'menu_id' => 3,
                'quantity' => 3,
                'unit_price' => 20000,
                'total_amount' => 60000,
                'payment_method' => 'Debit Card',
                'order_time' => Carbon::now()->subHours(1),
                'notes' => null
            ]
        ]);
    }
}
