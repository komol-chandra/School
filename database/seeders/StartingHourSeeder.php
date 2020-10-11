<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartingHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('starting_hours')->insert([
        	'sh_hour' => '10',
        ]);
        DB::table('starting_hours')->insert([
        	'sh_hour' => '11',
        ]);
        DB::table('starting_hours')->insert([
        	'sh_hour' => '12',
        ]);
        DB::table('starting_hours')->insert([
        	'sh_hour' => '1',
        ]);
    }
}
