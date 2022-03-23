<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class No extends Base
{
    protected $table = 'lang_no';

    /**
     * Get the Term that owns the NO Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
