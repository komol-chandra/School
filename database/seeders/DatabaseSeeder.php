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
            StartingHourSeeder::class,
            StartingMinuteSeeder::class,
            EndingHourSeeder::class,
            EndingMinuteSeeder::class,
            EventSeeder::class,
            TeacherSeeder::class,
            StaffSeeder::class,
            UserSeeder::class,
            appSettingSeeder::class,
        ]);
    }
}
