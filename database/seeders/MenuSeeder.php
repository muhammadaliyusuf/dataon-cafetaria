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
            'is_available' => true,
            'image_url' => 'nasigoreng.jpg'
        ]);

        Menu::create([
            'category_id' => 4,
            'name' => 'Pudding',
            'description' => 'Pudding Mango',
            'price' => 5000,
            'is_available' => true,
            'image_url' => 'pudding.jpg'
        ]);

        // Minuman
        Menu::create([
            'category_id' => 3,
            'name' => 'Kentang',
            'description' => 'Kentang Balado',
            'price' => 10000,
            'is_available' => true,
            'image_url' => 'kentang.jpg'
        ]);

        Menu::create([
            'category_id' => 2,
            'name' => 'Jus Alpukat',
            'description' => 'Jus alpukat segar dengan susu',
            'price' => 15000,
            'is_available' => true,
            'image_url' => 'jusalpukat.jpg'
        ]);

        Menu::create([
            'category_id' => 1,
            'name' => 'Gado-Gado',
            'description' => 'Gado-Gado Jawa',
            'price' => 12000,
            'is_available' => true,
            'image_url' => 'gadogado.jpg'
        ]);
    }
}
