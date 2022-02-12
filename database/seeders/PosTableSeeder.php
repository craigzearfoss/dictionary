<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partsOfSpeech =  [
            [
                'id'   => 1,
                'name' => ''
            ],
            [
                'id'   => 2,
                'name' => 'abbreviation'
            ],
            [
                'id'   => 3,
                'name' => 'adjective'
            ],
            [
                'id'   => 4,
                'name' => 'adverb'
            ],
            [
                'id'   => 5,
                'name' => 'conjunction'
            ],
            [
                'id'   => 6,
                'name' => 'determiner'
            ],
            [
                'id'   => 7,
                'name' => 'interjection'
            ],
            [
                'id'   => 8,
                'name' => 'noun'
            ],
            [
                'id'   => 9,
                'name' => 'number'
            ],
            [
                'id'   => 10,
                'name' => 'particle'
            ],
            [
                'id'   => 11,
                'name' => 'phrase'
            ],
            [
                'id'   => 12,
                'name' => 'preposition'
            ],
            [
                'id'   => 13,
                'name' => 'pronoun'
            ],
            [
                'id'   => 14,
                'name' => 'verb'
            ]
        ];

        foreach ($partsOfSpeech as $partOfSpeech) {
            DB::table('pos')->insert($partOfSpeech);
        }
    }
}
