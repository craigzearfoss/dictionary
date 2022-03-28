<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Gender extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'description'
    ];

    /**
     * Get the LangEs's for the Gender.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gender()
    {
        return $this->hasMany('\App\Models\Es');
    }

    /**
     * Get the Terms for the gender.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function term()
    {
        return $this->hasMany('\App\Models\Term');
    }
}
