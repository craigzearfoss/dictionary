<?php

namespace App\Models;

use App\Http\Requests\ThwordRequest;
use App\Models\TermTodo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Thword extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subject',
        'title',
        'description',
        'lang_id',
        'category_id',
        'grade_id',
        'synonyms',
        'antonyms',
        'terms',
        'active'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the lang that owns the thword.
     */
    public function lang()
    {
        return $this->belongsTo('App\Models\Lang');
    }

    /**
     * Get the category that owns the thword.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the category that owns the thword.
     */
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function getSynonyms()
    {
        return explode('|', $this->getAttribute('synonyms'));
    }

    public function getAntonyms()
    {
        return explode('|', $this->getAttribute('antonyms'));
    }

    public function getTerms()
    {
        return json_decode($this->getAttribute('terms'));
    }

    public static function findDuplicates(ThwordRequest|Array $thwordRequestOrDataArray, $excludeId = null)
    {
        return [];
    }
}
