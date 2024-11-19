<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are some users to associate events with
        $users = User::pluck('id')->toArray();

        if (empty($users)) {
            $this->command->warn('No users found. Please seed users first.');
            return;
        }

        // Generate 50 fake events
        Event::factory()->count(10)->create([
            'user_id' => fn () => $users[array_rand($users)],
        ]);
    }
}
