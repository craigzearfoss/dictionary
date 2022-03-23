<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class It extends Base
{
    protected $table = 'lang_it';

    /**
     * Get the Term that owns the IT Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
