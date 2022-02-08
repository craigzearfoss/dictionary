<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Lang extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'directionality',
        'local',
        'wiki',
        'full',
        'short',
        'abbrev',
        'enabled'
    ];

    const DIRECTIONALITIES = [
        'ltr',
        'rtl'
    ];

    /**
     * Returns the options for a select list.
     *
     * @return array
     */
    public static function selectOptions($labelName = 'short')
    {
        $data = [];
        foreach (self::all() as $row) {
            $data[$row->id] = $row->{$labelName};
        };

        return $data;
    }

    /**
     * Returns the options for a select list with the abbrev as the key.
     *
     * @return array
     */
    public static function selectOptionsByAbbrev($labelField = 'short')
    {
        $data = [];
        foreach (self::all() as $row) {//var_dump($row); die;
            $data[$row->abbrev] = $row->{$labelField};
        };

        return $data;
    }
}
