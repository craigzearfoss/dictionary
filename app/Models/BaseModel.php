<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

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
            $data[$row['id']] = $row[$labelField];
        };

        return $data;
    }
}
