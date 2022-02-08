<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Pos extends BaseModel
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
}
