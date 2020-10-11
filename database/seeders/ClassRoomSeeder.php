<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 1',
        ]);
        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 2',
        ]);
        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 3',
        ]);

        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 4',
        ]);
        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 5',
        ]);
        DB::table('class_room')->insert([
        	'classroom_name'=>'Class Room 6',
        ]);

    }
}
