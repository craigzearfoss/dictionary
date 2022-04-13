<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Pronoun extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'name',
        'formality',
        'person',
        'plurality',
        'gender'
    ];

    /**
     * Get the Language that owns the TileSet.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
