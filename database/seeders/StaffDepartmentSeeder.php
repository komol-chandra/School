<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StaffDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_departments')->insert([
			'staff_department_name'=>'Other',
		]);
		DB::table('staff_departments')->insert([
			'staff_department_name'=>'Office',
        ]);
        DB::table('staff_departments')->insert([
			'staff_department_name'=>'Account',
		]);
		DB::table('staff_departments')->insert([
			'staff_department_name'=>'Library',
		]);
    }
}
