<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_names')->insert([
        	'category_name'=>'Freedom Fighter',
        ]);
        DB::table('category_names')->insert([
        	'category_name'=>'Spectial Child',
        ]);
        DB::table('category_names')->insert([
        	'category_name'=>'Management',
        ]);

    }
}
