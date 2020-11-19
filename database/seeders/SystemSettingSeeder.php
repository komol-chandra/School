<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_settings')->insert([
            'system_name'    => 'Team#Zero School Management System',
            'title_name'     => 'School Management System',
            'school_email'   => 'teamzero@gmail.com',
            'contact_no'     => '01887747843',
            'school_address' => 'Dhaka Bangladesh',
            'footer_text'    => 'Team#Zero',
            'footer_link'    => 'teamzero@gmail.com',
            'regular_logo'   => 'regular_logo.png',
            'light_logo'     => 'light_logo.png',
            'small_logo'     => 'small_logo.png',
            'fav_icon'       => 'fav_icon.png',
        ]);
    }
}
