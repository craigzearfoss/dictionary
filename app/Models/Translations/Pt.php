<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pt extends Base
{
    protected $table = 'lang_pt';

    /**
     * Get the Term that owns the PT Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
