<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class ThwordplayBase extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    const DEFAULT_ID = 7;

    /**
     * Returns the options for a select list.
     *
     * @param string $labelField
     * @return array
     */
    public static function selectOptions($labelField = 'name')
    {
        $data = [];
        foreach (collect(self::all()->toArray())->sortBy($labelField) as $row) {
            $data[$row['id']] = $row['name'];
        };

        return $data;
    }
}
