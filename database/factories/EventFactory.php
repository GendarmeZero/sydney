<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // Real event types like meeting, birthday, day off
        $eventTypes = ['Meeting', 'Birthday', 'Day Off'];
        $eventType = $this->faker->randomElement($eventTypes);

        // Get a random user
        $user = User::inRandomOrder()->first();

        // Generate realistic event details based on the event type
        $name = '';
        $description = '';
        $eventDate = Carbon::now()->addDays($this->faker->numberBetween(1, 365)); // Random date within next year

        switch ($eventType) {
            case 'Meeting':
                $name = 'Meeting with ' . $user->name;
                $description = 'Discussion about the current projects and team updates.';
                $eventDate = $this->faker->dateTimeBetween('now', '+1 year'); // Random meeting time
                break;
            case 'Birthday':
                $name = $user->name . "'s Birthday";
                $description = 'Celebrate the birthday of ' . $user->name . '!';
                $eventDate = Carbon::parse($user->birthday)->setYear($eventDate->year); // Adjust the year for birthday
                break;
            case 'Day Off':
                $name = $user->name . ' - Day Off';
                $description = $user->name . ' is on a day off.';
                $eventDate = $this->faker->dateTimeBetween('now', '+1 year'); // Random date for day off
                break;
        }

        return [
            'name' => $name,
            'description' => $description,
            'event_date' => $eventDate,
            'user_id' => $user->id,
        ];
    }
}

