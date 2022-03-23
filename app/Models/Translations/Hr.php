<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr extends Base
{
    protected $table = 'lang_hr';

    /**
     * Get the Term that owns the HR Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
