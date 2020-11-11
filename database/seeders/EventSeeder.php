<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_calenders')->insert([
        	'event_title' => 'Event 1',
            'event_start_date' => '2020-11-10',
            'event_end_date' => '2020-11-11',
        ]);
        DB::table('event_calenders')->insert([
        	'event_title' => 'Event 2',
            'event_start_date' => '2020-11-12',
            'event_end_date' => '2020-11-13',
        ]);
        DB::table('event_calenders')->insert([
        	'event_title' => 'Event 3',
            'event_start_date' => '2020-12-10',
            'event_end_date' => '2020-12-11',
        ]);
        DB::table('event_calenders')->insert([
        	'event_title' => 'Event 4',
            'event_start_date' => '2020-12-12',
            'event_end_date' => '2020-12-15',
        ]);
    }
}
