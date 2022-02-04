<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  [
            [ 'name' => 'in colour'],
            [ 'name' => 'metal'],
            [ 'name' => 'place'],
            [ 'name' => 'vitality'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
