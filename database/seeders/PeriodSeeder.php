<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
        	'period_name' => '1st Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '2nd Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '3rd Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '4th Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '5th Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '6th Period',
        ]);
        DB::table('periods')->insert([
        	'period_name' => '7th Period',
        ]);
        
    }
}
