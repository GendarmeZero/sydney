<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Random 3-word title
            'description' => $this->faker->paragraph, // Random paragraph
            'event_date' => $this->faker->dateTimeBetween('now', '+1 year'), // Random date between now and next year
            'user_id' => User::inRandomOrder()->first()->id, // Random existing user
        ];
    }
}
