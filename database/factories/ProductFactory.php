<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->text(50),
            'image' => $this->faker->imageUrl(),
            'price' => random_int(750,2000),
            'sold' => random_int(0, 3000),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
