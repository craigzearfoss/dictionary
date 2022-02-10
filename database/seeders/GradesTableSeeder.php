<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades =  [
            [ 'name' => '', 'level' => 0],
            [ 'name' => 'kindergarten', 'level' => 1],
            [ 'name' => '1st grade', 'level' => 2],
            [ 'name' => '2nd grade', 'level' => 3],
            [ 'name' => '3rd grade', 'level' => 4],
            [ 'name' => '4th grade', 'level' => 5],
            [ 'name' => '5th grade', 'level' => 6],
            [ 'name' => '6th grade', 'level' => 7],
            [ 'name' => '7th grade', 'level' => 8],
            [ 'name' => '8th grade', 'level' => 9],
            [ 'name' => '9th grade', 'level' => 10],
            [ 'name' => '10th grade', 'level' => 11],
            [ 'name' => '11th grade', 'level' => 12],
            [ 'name' => '12th grade', 'level' => 13],
        ];

        foreach ($grades as $grade) {
            DB::table('grades')->insert($grade);
        }
    }
}
