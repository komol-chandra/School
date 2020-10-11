<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->insert([
        	'blood_name'=>'A+',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'A-',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'B+',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'B-',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'AB+',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'AB-',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'O+',
        ]);
        DB::table('bloods')->insert([
        	'blood_name'=>'O-',
        ]);
    }
}
