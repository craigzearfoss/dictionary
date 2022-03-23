<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ru extends Base
{
    protected $table = 'lang_ru';

    /**
     * Get the Term that owns the RU Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
