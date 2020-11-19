<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_settings')->insert([
            'school_name'    => 'Feni Computer Institute',
            'school_phone'   => '01887747843',
            'school_address' => 'Ranirhat, Feni, Bangladesh',
        ]);
    }
}
