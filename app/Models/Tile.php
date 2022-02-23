<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Tile extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'symbol',
        'base_symbol',
        'char_case',
        'seq',
        'krow',
        'kcol',
        'cnt',
        'name',
        'description',
        'dec',
        'oct',
        'hex',
        'bin',
        'html_number',
        'html_name',
        'value'
    ];

    /**
     * Get the Lang that owns the Tile Set.
     */
    public function tileSet()
    {
        return $this->belongsTo('App\Models\TileSet');
    }
}