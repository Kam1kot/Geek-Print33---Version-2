<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            AdminSeeder::class,
        ]);
        // User::factory(10)->create();
        // Category::factory(5)->create();
        $tags = Tag::factory(25)->create();
        $products = Product::factory(100)->create();
        
        $products->map(function ($product) use ($tags) {
            $tagsCount = random_int(1, 5);
            $tagsForPostIds = $tags->random($tagsCount)->pluck('id');
            $product->tags()->attach($tagsForPostIds);
        });
    }
}
