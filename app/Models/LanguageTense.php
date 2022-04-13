<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LanguageTense extends Pivot
{
    use HasFactory;

    protected $table = 'language_tense';

    protected $fillable = [
        'language_id',
        'tense_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function tense()
    {
        return $this->belongsTo(Tense::class);
    }
}
