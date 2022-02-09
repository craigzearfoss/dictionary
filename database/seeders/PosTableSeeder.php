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
            [ 'name' => ''],
            [ 'name' => 'abbreviation'],
            [ 'name' => 'adjective'],
            [ 'name' => 'adverb'],
            [ 'name' => 'conjunction'],
            [ 'name' => 'determiner'],
            [ 'name' => 'interjection'],
            [ 'name' => 'noun'],
            [ 'name' => 'number'],
            [ 'name' => 'particle'],
            [ 'name' => 'phrase'],
            [ 'name' => 'preposition'],
            [ 'name' => 'pronoun'],
            [ 'name' => 'verb']
        ];

        foreach ($partsOfSpeech as $partOfSpeech) {
            DB::table('pos')->insert($partOfSpeech);
        }
    }
}
