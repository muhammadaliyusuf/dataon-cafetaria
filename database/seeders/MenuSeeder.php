<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Makanan Utama
        Menu::create([
            'category_id' => 1,
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan telur, ayam, dan sayuran',
            'price' => 25000,
            'image' => 'nasigoreng.jpg'
        ]);

        Menu::create([
            'category_id' => 4,
            'name' => 'Pudding',
            'description' => 'Pudding Mango',
            'price' => 5000,
            'image' => 'pudding.jpg'
        ]);

        // Minuman
        Menu::create([
            'category_id' => 3,
            'name' => 'Kentang',
            'description' => 'Kentang Balado',
            'price' => 10000,
            'image' => 'kentang.jpg'
        ]);

        Menu::create([
            'category_id' => 2,
            'name' => 'Jus Alpukat',
            'description' => 'Jus alpukat segar dengan susu',
            'price' => 15000,
            'image' => 'jusalpukat.jpg'
        ]);

        Menu::create([
            'category_id' => 1,
            'name' => 'Gado-Gado',
            'description' => 'Gado-Gado Jawa',
            'price' => 12000,
            'image' => 'gadogado.jpg'
        ]);
    }
}
