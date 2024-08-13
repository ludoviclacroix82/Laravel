<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref' => 'REF' . fake()->numberBetween(0, 99) . '-' . fake()->numberBetween(0, 500) . '-' . fake()->numberBetween(0, 10000),
            'title' => fake()->sentence(4, true),
            'price' => fake()->numberBetween(100, 500),
            'tva' => fake()->randomElement([21, 12, 5]),
            'description' => fake()->text(200),
            'client_id' => fake()->numberBetween(1, 50),
            'author_id'=>fake()->numberBetween(1,17),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')            
        ];
    }
}
