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
        $user = User::factory()->create(); // Explicitly create and persist a User

        return [
            'user_id' => $user->id,  // Use the persisted user ID
            'status' => $this->faker->randomElement(['working', 'not working', 'on vacation']),
            'updated_at' => now(),
        ];
    }
}

