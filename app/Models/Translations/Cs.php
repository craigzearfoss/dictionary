<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cs extends Base
{
    protected $table = 'lang_cs';

    /**
     * Get the Term that owns the CS Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
