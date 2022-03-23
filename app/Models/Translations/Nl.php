<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nl extends Base
{
    protected $table = 'lang_nl';

    /**
     * Get the Term that owns the NL Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
