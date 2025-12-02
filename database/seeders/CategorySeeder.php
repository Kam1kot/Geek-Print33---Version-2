<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Игрушки'],
            ['title' => 'Фигурки'],
            ['title' => 'Декор'],
            ['title' => 'Рекламная продукция'],
            ['title' => 'Детали'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
