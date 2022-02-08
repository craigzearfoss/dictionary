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
     * @return array
     */
    public static function selectOptions()
    {
        $data = [];
        foreach (self::all() as $row) {
            $data[$row->id] = $row->name;
        };

        return $data;
    }
}
