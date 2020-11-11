<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'staff_name'             => 'Mr. rohim',
            'staff_email'            => 'rohim@info.com',
            'staff_password'         => '00000000',
            'staff_designation_name' => '3',
            'staff_department_name'  => '3',
            'staff_phone'            => '01812345678',
            'gender_name'            => '1',
            'blood_name'             => '1',
            'staff_facebook'         => 'https://www.facebook.com/info',
            'staff_twitter'          => 'https://www.twitter.com/info',
            'staff_linkedin'         => 'https://www.linkedin.com/info',
            'staff_address'          => 'Murmur 1,dhaka',
            'staff_about'            => ' hi i am mr. x',
            'staff_image'            => 'staff.png',
        ]);
        DB::table('staffs')->insert([
            'staff_name'             => 'Mr. korim',
            'staff_email'            => 'korim@info.com',
            'staff_password'         => '00000000',
            'staff_designation_name' => '3',
            'staff_department_name'  => '3',
            'staff_phone'            => '01812345670',
            'gender_name'            => '1',
            'blood_name'             => '1',
            'staff_facebook'         => 'https://www.facebook.com/info',
            'staff_twitter'          => 'https://www.twitter.com/info',
            'staff_linkedin'         => 'https://www.linkedin.com/info',
            'staff_address'          => 'Murmur 1,dhaka',
            'staff_about'            => ' hi i am mr. x',
            'staff_image'            => 'staff.png',
        ]);
        DB::table('staffs')->insert([
            'staff_name'             => 'Mr. x',
            'staff_email'            => 'rohim@info.com',
            'staff_password'         => '00000000',
            'staff_designation_name' => '3',
            'staff_department_name'  => '3',
            'staff_phone'            => '01812345678',
            'gender_name'            => '1',
            'blood_name'             => '1',
            'staff_facebook'         => 'https://www.facebook.com/info',
            'staff_twitter'          => 'https://www.twitter.com/info',
            'staff_linkedin'         => 'https://www.linkedin.com/info',
            'staff_address'          => 'Murmur 1,dhaka',
            'staff_about'            => ' hi i am mr. x',
            'staff_image'            => 'staff.png',
        ]);
        DB::table('staffs')->insert([
            'staff_name'             => 'Mr. y',
            'staff_email'            => 'rohim@info.com',
            'staff_password'         => '00000000',
            'staff_designation_name' => '3',
            'staff_department_name'  => '3',
            'staff_phone'            => '01812345678',
            'gender_name'            => '1',
            'blood_name'             => '1',
            'staff_facebook'         => 'https://www.facebook.com/info',
            'staff_twitter'          => 'https://www.twitter.com/info',
            'staff_linkedin'         => 'https://www.linkedin.com/info',
            'staff_address'          => 'Murmur 1,dhaka',
            'staff_about'            => ' hi i am mr. x',
            'staff_image'            => 'staff.png',
        ]);
    }
}
