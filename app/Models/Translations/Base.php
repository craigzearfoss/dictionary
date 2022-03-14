<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    protected $fillable = [
        'term_id',
        'word',
        'gender_id',
        'plurality_id',
        'tense_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the Term that owns the Translation.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }

    /**
     * Get the Gender that owns the LangEs.
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    /**
     * Get the Plurality that owns the LangEs.
     */
    public function plurality()
    {
        return $this->belongsTo('App\Models\Plurality');
    }

    /**
     * Get the Tense that owns the LangEs.
     */
    public function tense()
    {
        return $this->belongsTo('App\Models\Tense');
    }

    public static function fetch($id)
    {
        return self::select('*')
            ->where('id', $id)
            ->first();
    }
}
