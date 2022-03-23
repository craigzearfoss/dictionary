<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fr extends Base
{
    protected $table = 'lang_fi';

    /**
     * Get the Term that owns the FR Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
