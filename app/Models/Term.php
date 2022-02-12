<?php

namespace App\Models;

use App\Http\Requests\TermRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'term',
        'definition',
        'sentence',
        'pos_id',
        'category_id',
        'grade_id',
        'pos_text',
        'collins_tag',
        'collins_def',
        'en_us',
        'pron_en_us',
        'en_uk',
        'pron_en_uk',
        'ar',
        'cs',
        'da',
        'de',
        'el',
        'es_es',
        'es_la',
        'fi',
        'fr',
        'hr',
        'it',
        'ja',
        'ko',
        'nl',
        'no',
        'pl',
        'pt_br',
        'pt_pt',
        'ro',
        'ru',
        'sv',
        'th',
        'tr',
        'uk',
        'vi',
        'zh',
        'enabled'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the category that owns the term.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the category that owns the term.
     */
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    /**
     * Get the part of speech that owns the term.
     */
    public function pos()
    {
        return $this->belongsTo('App\Models\Pos');
    }

    public static function findDuplicates(TermRequest $termRequestOrDataArray, $excludeId = null)
    {
        $data = is_array($termRequestOrDataArray)
            ? $termRequestOrDataArray
            : $termRequestOrDataArray->all();

        $builder = self::where('term', $data['term'])
            ->where('pos_id', $data['pos_id'])
            ->where('collins_def', $data['collins_def']);

        if (!empty($excludeId)) {
            $builder->where('id', '!=', $excludeId);
        }

        return $builder->get();
    }
}
