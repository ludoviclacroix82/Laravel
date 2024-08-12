<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' =>fake()->address() ,
            'tva' => fake()->stateAbbr().'123456889' ,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
