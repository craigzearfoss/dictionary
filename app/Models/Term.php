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
     * Get the Translations for the specified Language code.
     */
    public function translations($languageCode)
    {
        if (method_exists($this, $languageCode)) {
            return $this->{$languageCode};
        } else {
            die('Bad language code');
        }
    }

    /**
     * Get the ar (Arabic) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ar()
    {
        return $this->hasMany('\App\Models\Translations\Ar');
    }

    /**
     * Get the cs (Czech) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cs()
    {
        return $this->hasMany('\App\Models\Translations\Cs');
    }

    /**
     * Get the da (Danish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function da()
    {
        return $this->hasMany('\App\Models\Translations\Da');
    }

    /**
     * Get the de (German) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function de()
    {
        return $this->hasMany('\App\Models\Translations\De');
    }

    /**
     * Get the el (Greek) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function el()
    {
        return $this->hasMany('\App\Models\Translations\El');
    }

    /**
     * Get the en (English) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function en()
    {
        return $this->hasMany('\App\Models\Translations\En');
    }

    /**
     * Get the es (Spanish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function es()
    {
        return $this->hasMany('\App\Models\Translations\Es');
    }

    /**
     * Get the fi (Finnish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fi()
    {
        return $this->hasMany('\App\Models\Translations\Fi');
    }

    /**
     * Get the fr (French) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fr()
    {
        return $this->hasMany('\App\Models\Translations\Fr');
    }

    /**
     * Get the hr (Croatian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hr()
    {
        return $this->hasMany('\App\Models\Translations\Hr');
    }

    /**
     * Get the it (Italian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function it()
    {
        return $this->hasMany('\App\Models\Translations\It');
    }

    /**
     * Get the ja (Japanese) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ja()
    {
        return $this->hasMany('\App\Models\Translations\Ja');
    }

    /**
     * Get the ko (Korean) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ko()
    {
        return $this->hasMany('\App\Models\Translations\Ko');
    }

    /**
     * Get the nl (Dutch) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nl()
    {
        return $this->hasMany('\App\Models\Translations\Nl');
    }

    /**
     * Get the no (Norwegian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function no()
    {
        return $this->hasMany('\App\Models\Translations\No');
    }

    /**
     * Get the pl (Polish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pl()
    {
        return $this->hasMany('\App\Models\Translations\Pl');
    }

    /**
     * Get the pt (Portuguese) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pt()
    {
        return $this->hasMany('\App\Models\Translations\Pt');
    }

    /**
     * Get the ro (Romanian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ro()
    {
        return $this->hasMany('\App\Models\Translations\Ro');
    }

    /**
     * Get the ru (Russian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ru()
    {
        return $this->hasMany('\App\Models\Translations\Ru');
    }

    /**
     * Get the sv (Swedish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sv()
    {
        return $this->hasMany('\App\Models\Translations\Sv');
    }

    /**
     * Get the th (Thai) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function th()
    {
        return $this->hasMany('\App\Models\Translations\Th');
    }

    /**
     * Get the tr (Turkish) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tr()
    {
        return $this->hasMany('\App\Models\Translations\Tr');
    }

    /**
     * Get the uk (Ukrainian) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uk()
    {
        return $this->hasMany('\App\Models\Translations\Uk');
    }

    /**
     * Get the vi (Vietnamese) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vi()
    {
        return $this->hasMany('\App\Models\Translations\Vi');
    }

    /**
     * Get the zh (Chinese) Translation for the Term.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zh()
    {
        return $this->hasMany('\App\Models\Translations\Zh');
    }
}
