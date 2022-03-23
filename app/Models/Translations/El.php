<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class El extends Base
{
    protected $table = 'lang_el';

    /**
     * Get the Term that owns the EL Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
