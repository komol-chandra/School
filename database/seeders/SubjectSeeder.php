<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            'class_name'   => '1',
            'subject_name' => 'English',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '1',
            'subject_name' => 'Bangla',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '1',
            'subject_name' => 'Math',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '1',
            'subject_name' => 'English',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '2',
            'subject_name' => 'Bangla',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '2',
            'subject_name' => 'Math',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '3',
            'subject_name' => 'English',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '3',
            'subject_name' => 'Bangla',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '3',
            'subject_name' => 'Math',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '4',
            'subject_name' => 'English',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '4',
            'subject_name' => 'Bangla',
        ]);
        DB::table('subject')->insert([
            'class_name'   => '4',
            'subject_name' => 'Math',
        ]);
    }
}
