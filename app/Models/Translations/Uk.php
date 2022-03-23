<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uk extends Base
{
    protected $table = 'lang_uk';

    /**
     * Get the Term that owns the UK Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
