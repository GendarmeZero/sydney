<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        // Example addresses to seed
        $addresses = [
            [
                'user_id' => 1,
                'address_line1' => '123 Main St',
                'address_line2' => 'Apt 4B',
                'city' => 'Anytown',
                'state' => 'CA',
                'zip' => '12345',
                'country' => 'USA', // Add country here
            ],
            [
                'user_id' => 2,
                'address_line1' => '456 Elm St',
                'address_line2' => null,
                'city' => 'Othertown',
                'state' => 'NY',
                'zip' => '67890',
                'country' => 'USA', // Add country here
            ],
        ];

        // Insert the addresses into the database
        DB::table('addresses')->insert($addresses);
    }
}
