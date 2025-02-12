<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ar extends Base
{
    protected $table = 'lang_ar';

    /**
     * Get the Term that owns the AR Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
