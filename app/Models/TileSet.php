<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class TileSet extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'official',
        'lang_id',
        'num_tiles'
    ];

    /**
     * Get the Lang that owns the Tile Set.
     */
    public function lang()
    {
        return $this->belongsTo('App\Models\Lang');
    }
}
