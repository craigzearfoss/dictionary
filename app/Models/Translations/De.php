<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class De extends Base
{
    protected $table = 'lang_de';

    /**
     * Get the Term that owns the DE Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
