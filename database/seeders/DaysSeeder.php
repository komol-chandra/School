<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
        	'day_name' => 'Saturday',
        ]);

        DB::table('days')->insert([
        	'day_name' => 'Sunday',
        ]);

        DB::table('days')->insert([
        	'day_name' => 'Monday',
        ]);

        DB::table('days')->insert([
        	'day_name' => 'Tuesday',
        ]);
        DB::table('days')->insert([
        	'day_name' => 'Wednesday',
        ]);

        DB::table('days')->insert([
        	'day_name' => 'Thursday',
        ]);

        DB::table('days')->insert([
        	'day_name' => 'Friday',
        ]);


    }
}
