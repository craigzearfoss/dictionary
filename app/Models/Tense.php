<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Tense extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'structure',
        'example1',
        'example2',
        'tense',
        'continuous',
        'perfect'
    ];

    const TENSES = [
        1 => 'n/a',
        2 => 'past',
        3 => 'present',
        4 => 'future'
    ];

    /**
     * Returns the options for a select list.
     *
     * @param string $labelField
     * @return array
     */
    public static function selectOptions($labelField = 'name')
    {
        return self::TENSES;
    }
}
