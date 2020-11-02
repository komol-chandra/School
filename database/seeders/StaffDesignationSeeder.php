<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_designations')->insert([
			'staff_designation_name'=>'Worker',
		]);
		DB::table('staff_designations')->insert([
			'staff_designation_name'=>'Office Staff',
        ]);
        DB::table('staff_designations')->insert([
			'staff_designation_name'=>'Accuntant',
		]);
		DB::table('staff_designations')->insert([
			'staff_designation_name'=>'Librarian',
		]);
		DB::table('staff_designations')->insert([
			'staff_designation_name'=>'Library Staff',
		]);
    }
}
