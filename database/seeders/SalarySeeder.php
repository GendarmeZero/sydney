<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SalarySeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $paymentFrequencies = ['hourly', 'daily', 'weekly', 'monthly', 'yearly'];

        foreach ($users as $user) {
            DB::table('salaries')->insert([
                'user_id' => $user->id,
                'amount' => rand(20000, 100000),
                'payment_frequency' => $paymentFrequencies[array_rand($paymentFrequencies)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
