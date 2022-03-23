<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Th extends Base
{
    protected $table = 'lang_th';

    /**
     * Get the Term that owns the TH Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
