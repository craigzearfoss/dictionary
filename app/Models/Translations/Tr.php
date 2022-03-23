<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr extends Base
{
    protected $table = 'lang_tr';

    /**
     * Get the Term that owns the TR Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
