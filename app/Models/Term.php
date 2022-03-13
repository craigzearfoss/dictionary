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
        'collins_en_us',
        'pron_en_us',
        'collins_en_uk',
        'pron_en_uk',
        'collins_ar',
        'collins_cs',
        'collins_da',
        'collins_de',
        'collins_el',
        'collins_es_es',
        'collins_es_la',
        'collins_fi',
        'collins_fr',
        'collins_hr',
        'collins_it',
        'collins_ja',
        'collins_ko',
        'collins_nl',
        'collins_no',
        'collins_pl',
        'collins_pt_br',
        'collins_pt_pt',
        'collins_ro',
        'collins_ru',
        'collins_sv',
        'collins_th',
        'collins_tr',
        'collins_uk',
        'collins_vi',
        'collins_zh',
        'active'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the Category that owns the Term.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the Grade that owns the Term.
     */
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    /**
     * Get the Pos (part of speech) that owns the Term.
     */
    public function pos()
    {
        return $this->belongsTo('App\Models\Pos');
    }

    public static function findDuplicates(TermRequest|Array $termRequestOrDataArray, $excludeId = null)
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


    /**
     * Get the LangEs for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function langEs()
    {
        return $this->hasOne('\App\Models\LangEs');
    }
}
