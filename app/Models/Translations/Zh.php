<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zh extends Base
{
    protected $table = 'lang_zh';

    /**
     * Get the Term that owns the ZH Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
