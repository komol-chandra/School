<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'teacher_name'             => 'Mr. rohim',
            'teacher_designation_name' => '3',
            'department_name'          => '3',
            'teacher_phone'            => '01812345678',
            'gender_name'              => '1',
            'blood_name'               => '1',
            'teacher_facebook'         => 'https://www.facebook.com/info',
            'teacher_twitter'          => 'https://www.twitter.com/info',
            'teacher_linkedin'         => 'https://www.linkedin.com/info',
            'teacher_address'          => 'mirpur 1,dhaka',
            'teacher_about'            => ' hi i am mr. x',
            'teacher_image'            => '',
        ]);
        DB::table('teachers')->insert([
            'teacher_name'             => 'Mr. korim',
            'teacher_password'         => '00000000',
            'teacher_designation_name' => '4',
            'department_name'          => '4',
            'teacher_phone'            => '01812345678',
            'gender_name'              => '1',
            'blood_name'               => '2',
            'teacher_facebook'         => 'https://www.facebook.com/info',
            'teacher_twitter'          => 'https://www.twitter.com/info',
            'teacher_linkedin'         => 'https://www.linkedin.com/info',
            'teacher_address'          => 'mirpur 1,dhaka',
            'teacher_about'            => ' hi i am mr. x',
            'teacher_image'            => '',
        ]);
        DB::table('teachers')->insert([
            'teacher_name'             => 'Mr. x',
            'teacher_email'            => 'teacher@info.com',
            'teacher_password'         => '00000000',
            'teacher_designation_name' => '3',
            'department_name'          => '3',
            'teacher_phone'            => '01812345678',
            'gender_name'              => '1',
            'blood_name'               => '1',
            'teacher_facebook'         => 'https://www.facebook.com/info',
            'teacher_twitter'          => 'https://www.twitter.com/info',
            'teacher_linkedin'         => 'https://www.linkedin.com/info',
            'teacher_address'          => 'mirpur 1,dhaka',
            'teacher_about'            => ' hi i am mr. x',
            'teacher_image'            => '',
        ]);
        DB::table('teachers')->insert([
            'teacher_name'             => 'Mr. y',
            'teacher_email'            => 'teacher@info.com',
            'teacher_password'         => '00000000',
            'teacher_designation_name' => '3',
            'department_name'          => '3',
            'teacher_phone'            => '01812345678',
            'gender_name'              => '1',
            'blood_name'               => '1',
            'teacher_facebook'         => 'https://www.facebook.com/info',
            'teacher_twitter'          => 'https://www.twitter.com/info',
            'teacher_linkedin'         => 'https://www.linkedin.com/info',
            'teacher_address'          => 'mirpur 1,dhaka',
            'teacher_about'            => ' hi i am mr. x',
            'teacher_image'            => '',
        ]);
        DB::table('teachers')->insert([
            'teacher_name'             => 'Mr. z',
            'teacher_email'            => 'teacher@info.com',
            'teacher_password'         => '00000000',
            'teacher_designation_name' => '3',
            'department_name'          => '3',
            'teacher_phone'            => '01812345678',
            'gender_name'              => '1',
            'blood_name'               => '1',
            'teacher_facebook'         => 'https://www.facebook.com/info',
            'teacher_twitter'          => 'https://www.twitter.com/info',
            'teacher_linkedin'         => 'https://www.linkedin.com/info',
            'teacher_address'          => 'mirpur 1,dhaka',
            'teacher_about'            => ' hi i am mr. x',
            'teacher_image'            => '',
        ]);
    }
}
