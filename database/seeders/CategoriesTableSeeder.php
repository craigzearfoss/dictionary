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
            [
                'id'   => 1,
                'name' => '(ALL)'
            ],
            [ 'name' => 'amphibian' ],
            [ 'name' => 'anatomy' ],
            [ 'name' => 'appliance' ],
            [ 'name' => 'beverage' ],
            [ 'name' => 'bird' ],
            [ 'name' => 'city' ],
            [ 'name' => 'clothing' ],
            [ 'name' => 'color' ],
            [ 'name' => 'continent' ],
            [ 'name' => 'country' ],
            [ 'name' => 'crustacean' ],
            [ 'name' => 'currency' ],
            [ 'name' => 'direction' ],
            [ 'name' => 'event' ],
            [ 'name' => 'exercise' ],
            [ 'name' => 'family relation' ],
            [ 'name' => 'fish' ],
            [ 'name' => 'food' ],
            [ 'name' => 'fruit' ],
            [ 'name' => 'furniture' ],
            [ 'name' => 'game' ],
            [ 'name' => 'geographical feature' ],
            [ 'name' => 'geographical place' ],
            [ 'name' => 'geometry term' ],
            [ 'name' => 'holiday' ],
            [ 'name' => 'insect' ],
            [ 'name' => 'language' ],
            [ 'name' => 'mammal' ],
            [ 'name' => 'mollusk' ],
            [ 'name' => 'musical instrument' ],
            [ 'name' => 'nationality' ],
            [ 'name' => 'number' ],
            [ 'name' => 'occupation' ],
            [ 'name' => 'ocean' ],
            [ 'name' => 'part of speech' ],
            [ 'name' => 'planet' ],
            [ 'name' => 'plant' ],
            [ 'name' => 'religion' ],
            [ 'name' => 'reptile' ],
            [ 'name' => 'season' ],
            [ 'name' => 'sport' ],
            [ 'name' => 'state' ],
            [ 'name' => 'time unit' ],
            [ 'name' => 'transportation' ],
            [ 'name' => 'unit of measure' ],
            [ 'name' => 'vegetable' ]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
