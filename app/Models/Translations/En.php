<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class En extends Base
{
    protected $table = 'lang_en';

    /**
     * Get the Term that owns the EL Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
