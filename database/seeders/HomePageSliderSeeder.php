<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_page_sliders')->insert([
            'slider_title1'             => 'Slider Title 1!',
            'slider_title1_descryption' => 'Team#Zero Slider1',
            'slider_title2'             => 'Slider Title 2!',
            'slider_title2_descryption' => 'Team#Zero Slider2',
            'slider_title3'             => 'Slider Title 3!',
            'slider_title3_descryption' => 'Team#Team#Zero Slider3',

        ]);
    }
}
