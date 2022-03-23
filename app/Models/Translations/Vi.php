<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vi extends Base
{
    protected $table = 'lang_vi';

    /**
     * Get the Term that owns the VI Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
