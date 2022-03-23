<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pl extends Base
{
    protected $table = 'lang_pl';

    /**
     * Get the Term that owns the PL Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
