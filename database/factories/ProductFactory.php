<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

    'name' => fake()->words(2, true), // e.g., "Cool Shirt"
    'category' => fake()->randomElement(['t-shirt', 'shoes', 'belt', 'watch']),
    'description' => fake()->sentence(),
    'price' => fake()->randomFloat(2, 10, 300),
    'old_price' => function (array $attributes) {
        return $attributes['price'] + fake()->randomFloat(2, 5, 50);
    },
    'stock' => fake()->numberBetween(0, 200),
    'image' => fake()->imageUrl(640, 480, 'fashion', true), // Placeholder image
    'rating' => fake()->randomFloat(1, 1, 5),
];
    }
}
