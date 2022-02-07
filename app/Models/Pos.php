<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the terms for the pos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function term()
    {
        return $this->hasMany('\App\Models\Term');
    }

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
