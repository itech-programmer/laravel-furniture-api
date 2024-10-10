<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('furniture')->insert([
            [
                'name' => 'Chair',
                'description' => 'Comfortable wooden chair',
                'price' => 49.99,
                'in_stock' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Table',
                'description' => 'Large dining table',
                'price' => 149.99,
                'in_stock' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sofa',
                'description' => 'Stylish leather sofa',
                'price' => 499.99,
                'in_stock' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
