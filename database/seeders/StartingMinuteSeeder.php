<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartingMinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('starting_minutes')->insert([
        	'sm_minute' => '0',
        ]);
        DB::table('starting_minutes')->insert([
        	'sm_minute' => '5',
        ]);
        DB::table('starting_minutes')->insert([
        	'sm_minute' => '10',
        ]);
        DB::table('starting_minutes')->insert([
        	'sm_minute' => '15',
        ]);
        DB::table('starting_minutes')->insert([
        	'sm_minute' => '20',
        ]);
    }

}
