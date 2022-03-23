<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ro extends Base
{
    protected $table = 'lang_ro';

    /**
     * Get the Term that owns the RO Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
