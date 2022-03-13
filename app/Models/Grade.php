<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Grade extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level'
    ];

    /**
     * Returns the options for a select list.
     *
     * @return array
     */
    public static function selectOptions($labelField = 'name')
    {
        $data = [];
        foreach (collect(self::all()->toArray())->sortBy('level') as $row) {
            $data[$row['id']] = $row[$labelField];
        };

        return $data;
    }
}
