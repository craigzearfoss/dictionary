<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Es extends Base
{
    protected $table = 'lang_es';

    /**
     * Get the Term that owns the ES Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
