<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ko extends Base
{
    protected $table = 'lang_ko';

    /**
     * Get the Term that owns the KO Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
