<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section_names')->insert([
            'class_name'   => '1',
            'section_name' => 'A',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '1',
            'section_name' => 'B',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '2',
            'section_name' => 'A',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '2',
            'section_name' => 'B',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '3',
            'section_name' => 'A',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '3',
            'section_name' => 'B',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '4',
            'section_name' => 'A',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '4',
            'section_name' => 'B',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '5',
            'section_name' => 'A',
        ]);
        DB::table('section_names')->insert([
            'class_name'   => '5',
            'section_name' => 'B',
        ]);
    }
}
