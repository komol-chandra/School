<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('department')->insert([
        	'department_name' => 'Art Department',
        ]);

        DB::table('department')->insert([
        	'department_name' => 'Science Department',
        ]);

        DB::table('department')->insert([
        	'department_name' => 'Math Department',
        ]);

        DB::table('department')->insert([
        	'department_name' => 'Biology Department',
        ]);
        DB::table('department')->insert([
        	'department_name' => 'Business Studies Department',
        ]);

        DB::table('department')->insert([
        	'department_name' => 'Chemistry Department',
        ]);
    }
}
