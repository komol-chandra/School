<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EndingMinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ending_minutes')->insert([
        	'em_minute' => '0',
        ]);
        DB::table('ending_minutes')->insert([
        	'em_minute' => '5',
        ]);
        DB::table('ending_minutes')->insert([
        	'em_minute' => '10',
        ]);
        DB::table('ending_minutes')->insert([
        	'em_minute' => '15',
        ]);
        DB::table('ending_minutes')->insert([
        	'em_minute' => '20',
        ]);
    }
}
