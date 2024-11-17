<?php

namespace Database\Factories;

use App\Models\EmployeeStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeStatusFactory extends Factory
{
    protected $model = EmployeeStatus::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Creates or associates a user
            'status' => $this->faker->randomElement(['working', 'not working', 'on vacation']),
            'updated_at' => now(),
        ];
    }
}
