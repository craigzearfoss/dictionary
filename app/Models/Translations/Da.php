<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Da extends Base
{
    protected $table = 'lang_da';

    /**
     * Get the Term that owns the DA Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
