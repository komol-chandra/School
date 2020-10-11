<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_names')->insert([
        	'class_name' => 'Class One',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Two',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Three',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Four',
        ]);
        DB::table('class_names')->insert([
        	'class_name' => 'Class Five',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Six',
        ]);
        DB::table('class_names')->insert([
        	'class_name' => 'Class Seven',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Eight',
        ]);
        DB::table('class_names')->insert([
        	'class_name' => 'Class Nine',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => 'Class Ten',
        ]);
    }
}
