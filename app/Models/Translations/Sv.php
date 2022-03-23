<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sv extends Base
{
    protected $table = 'lang_sv';

    /**
     * Get the Term that owns the SV Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
