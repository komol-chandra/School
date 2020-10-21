<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
        	'gender_name'=>'Male',
        ]);
        DB::table('genders')->insert([
        	'gender_name'=>'Female',
        ]);
        DB::table('genders')->insert([
        	'gender_name'=>'Others',
        ]);
    }
}
