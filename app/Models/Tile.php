<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Tile extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'language_id',
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
     * Get the TileSet that owns the Tile.
     */
    public function tileSet()
    {
        return $this->belongsTo('App\Models\TileSet');
    }
}
