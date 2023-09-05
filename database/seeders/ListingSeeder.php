<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\Listing;

class ListingSeeder extends Seeder
{
    public function run()
    {
        // Truncate (empty) the table
        //DB::table('table_name')->truncate();

        // Use the factory to create 10 Listing records with 'by_user_id' set to 3
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 3
        ]);
    }
}