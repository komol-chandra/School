<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Nipen',
            'email' => 'amitmojumder356@gmail.com',
            'password' => '$2y$10$h.6aNPkOPiejef0mqAkHv.mLaztTjYV.Uw/0wY8eYEY6w/9CTMePq',
        ]);
    }
}
