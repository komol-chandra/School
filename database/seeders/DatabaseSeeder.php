<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            DepartmentSeeder::class,
            ClassSeeder::class,
            SectionSeeder::class,
            GenderSeeder::class,
            BloodSeeder::class,
            CategorySeeder::class,
            TeacherDesignationSeeder::class,
            ClassRoomSeeder::class,
            StaffDesignationSeeder::class,
            StaffDepartmentSeeder::class,
            DaysSeeder::class,
            EventSeeder::class,
            // TeacherSeeder::class,
            StaffSeeder::class,
            SubjectSeeder::class,
            UserSeeder::class,
            SystemSettingSeeder::class,
            SchoolSeetingSeeder::class,
            GeneralSettingSeeder::class,
            AboutUsSeeder::class,
            TermsConditionSeeder::class,
            PrivacyPolicySeeder::class,
            HomePageSliderSeeder::class,
            PeriodSeeder::class,
        ]);
    }
}
