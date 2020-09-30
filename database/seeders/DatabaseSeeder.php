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
            GenderSeeder::class,
            BloodSeeder::class,
            CategorySeeder::class,
            TeacherDesignationSeeder::class,
        ]);
    }
}
