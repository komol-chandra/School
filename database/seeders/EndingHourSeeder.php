<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EndingHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ending_hours')->insert([
        	'en_hour' => '10',
        ]);
        DB::table('ending_hours')->insert([
        	'en_hour' => '11',
        ]);
        DB::table('ending_hours')->insert([
        	'en_hour' => '12',
        ]);
        DB::table('ending_hours')->insert([
        	'en_hour' => '1',
        ]);
    }
}
