<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            'website_title'   => 'Team#Zero',
            'link_facebook'   => 'https://www.facebook.com/mahbub.jubair/',
            'link_twitter'    => 'https://twitter.com/jubair_mahbub',
            'link_linkedin'   => 'https://www.linkedin.com/in/ahsan-mahbub-27735a1b3/',
            'link_google'     => 'amjubair820@gmail.com',
            'link_youtube'    => 'youtube.com',
            'link_instagram'  => 'instragram.com',
            'home_title'      => 'Team#Zero',
            'school_address'  => 'Dhaka Bangladesh',
            'copy_right_text' => 'All right resurved by',
        ]);
    }
}
