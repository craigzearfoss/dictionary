<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollinsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =  [
            [ 'name' => '(ALL)'],
            [ 'name' => 'about'],
            [ 'name' => 'air'],
            [ 'name' => 'all'],
            [ 'name' => 'allow'],
            [ 'name' => 'animal'],
            [ 'name' => 'animals'],
            [ 'name' => 'ball'],
            [ 'name' => 'bird'],
            [ 'name' => 'brackets'],
            [ 'name' => 'choose'],
            [ 'name' => 'cloth'],
            [ 'name' => 'companionship'],
            [ 'name' => 'computer'],
            [ 'name' => 'country'],
            [ 'name' => 'current'],
            [ 'name' => 'design'],
            [ 'name' => 'egg'],
            [ 'name' => 'electrical'],
            [ 'name' => 'food'],
            [ 'name' => 'for building'],
            [ 'name' => 'for repairs'],
            [ 'name' => 'for tennis'],
            [ 'name' => 'from society'],
            [ 'name' => 'fruit'],
            [ 'name' => 'game'],
            [ 'name' => 'good'],
            [ 'name' => 'greetings card'],
            [ 'name' => 'hat'],
            [ 'name' => 'in colour'],
            [ 'name' => 'in eye'],
            [ 'name' => 'language'],
            [ 'name' => 'leg'],
            [ 'name' => 'letter'],
            [ 'name' => 'lowest part'],
            [ 'name' => 'machine'],
            [ 'name' => 'material'],
            [ 'name' => 'meal'],
            [ 'name' => 'meat'],
            [ 'name' => 'metal'],
            [ 'name' => 'musical instrument'],
            [ 'name' => 'necktie'],
            [ 'name' => 'nut'],
            [ 'name' => 'obstruction'],
            [ 'name' => 'of a computer network'],
            [ 'name' => 'on teeth'],
            [ 'name' => 'organization'],
            [ 'name' => 'part of body'],
            [ 'name' => 'people'],
            [ 'name' => 'person'],
            [ 'name' => 'pet'],
            [ 'name' => 'petticoat'],
            [ 'name' => 'place'],
            [ 'name' => 'playing card'],
            [ 'name' => 'powder'],
            [ 'name' => 'punctuation'],
            [ 'name' => 'restriction'],
            [ 'name' => 'section of a building'],
            [ 'name' => 'shelter for a car'],
            [ 'name' => 'shop'],
            [ 'name' => 'sign of zodiac'],
            [ 'name' => 'soil'],
            [ 'name' => 'speech'],
            [ 'name' => 'stick'],
            [ 'name' => 'tiny piece'],
            [ 'name' => 'tree'],
            [ 'name' => 'vitality'],
            [ 'name' => 'water'],
            [ 'name' => 'with rules']
        ];

        foreach ($tags as $tag) {
            DB::table('collins_tags')->insert($tag);
        }
    }
}
