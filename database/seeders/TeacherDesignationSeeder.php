<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('teacher_designations')->insert([
			'teacher_designation_name'=>'Principal',
		]);
		DB::table('teacher_designations')->insert([
			'teacher_designation_name'=>'Depertment Head',
		]);
		DB::table('teacher_designations')->insert([
			'teacher_designation_name'=>'Senior Teacher',
		]);
		DB::table('teacher_designations')->insert([
			'teacher_designation_name'=>'junior Teacher',
		]);
    }
}
