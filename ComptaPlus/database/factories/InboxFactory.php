<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inbox>
 */
class InboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id'=> fake()->numberBetween(1, 17),
            'receiver_id'=> fake()->numberBetween(1, 17),
            'subject'=> fake()->sentence(4, true), 
            'body'=>fake()->text(200), 
            'is_read'=> false,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
