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
            [
                'id'    => 1,
                'name'  => '(ALL)',
                'level' => 0
            ],
            [
                'id'    => 2,
                'name'  => 'kindergarten',
                'level' => 1
            ],
            [
                'id'    => 3,
                'name'  => '1st grade',
                'level' => 2
            ],
            [
                'id'    => 4,
                'name'  => '2nd grade',
                'level' => 3
            ],
            [
                'id'    => 5,
                'name'  => '3rd grade',
                'level' => 4
            ],
            [
                'id'    => 6,
                'name'  => '4th grade',
                'level' => 5
            ],
            [
                'id'    => 7,
                'name'  => '5th grade',
                'level' => 6
            ],
            [
                'id'    => 8,
                'name'  => '6th grade',
                'level' => 7
            ],
            [
                'id'    => 9,
                'name'  => '7th grade',
                'level' => 8
            ],
            [
                'id'    => 10,
                'name'  => '8th grade',
                'level' => 9
            ],
            [
                'id'    => 11,
                'name'  => '9th grade',
                'level' => 10
            ],
            [
                'id'    => 12,
                'name'  => '10th grade',
                'level' => 11
            ],
            [
                'id'    => 13,
                'name'  => '11th grade',
                'level' => 12
            ],
            [
                'id'    => 14,
                'name'  => '12th grade',
                'level' => 13
            ],
            [
                'id'    => 15,
                'name'  => 'college',
                'level' => 14
            ]
        ];

        foreach ($grades as $grade) {
            DB::table('grades')->insert($grade);
        }
    }
}
