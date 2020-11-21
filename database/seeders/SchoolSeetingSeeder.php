<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_settings')->insert([
            'school_name'    => 'School Management System',
            'school_phone'     => '01887747843',
            'school_address' => 'Dhaka Bangladesh',
        ]);
    }
}
