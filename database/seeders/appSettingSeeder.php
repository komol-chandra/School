<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class appSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->insert([
            'app_settings_name' => 'Project',
            'app_settings_email'=>'Project@gmail.com',
            'app_settings_phone'=>'0181234578',
            'app_settings_address'=>'Bangladesh',
            'app_settings_about'=>'Management App',
            'app_settings_logo'=>'logo.png',
        ]);  
    }
}
