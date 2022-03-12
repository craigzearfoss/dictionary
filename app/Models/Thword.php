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
        'language_id',
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
     * Get the Language that owns the Thword.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    /**
     * Get the Category that owns the Thword.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the Grade that owns the Thword.
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
