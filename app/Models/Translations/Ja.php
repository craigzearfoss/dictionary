<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ja extends Base
{
    protected $table = 'lang_ja';

    /**
     * Get the Term that owns the JA Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
