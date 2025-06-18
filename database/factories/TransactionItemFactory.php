<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionItem>
 */
class TransactionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

    'transaction_id' => \App\Models\Transaction::inRandomOrder()->first()?->id ?? 1,
    'product_id' => \App\Models\Product::inRandomOrder()->first()?->id ?? 1,
    'quantity' => fake()->numberBetween(1, 5),
    'price' => fake()->randomFloat(2, 10, 100), // Unit price
];

    }
}
