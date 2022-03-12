<?php

namespace App\Models;

use App\Http\Requests\ThwordplayRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Thwordplay extends BaseModel
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
        'bonuses',
        'questions',
        'active'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the Language that owns the Thwordplay.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    /**
     * Get the Category that owns the Thwordplay.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the Grade that owns the Thwordplay.
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

    public function getBonusQuestions()
    {
        return json_decode($this->getAttribute('bonuses'));
    }

    public function getBonusAnswers()
    {
        $data = explode("|", $this->getAttribute('antonyms'));
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = explode('`', $data[$i]);
        }

        return $data;
    }

    public function getThwords()
    {
        $col1 = $this->getSynonyms();
        $bonusCols = $this->getBonusAnswers();
        $numRows = max(count($col1), count($bonusCols));

        $data =[];
        for ($i=0; $i < $numRows; $i++) {
            $data[] = [
                $col1[$i] ?? '',
                $bonusCols[$i][0] ?? '',
                $bonusCols[$i][1] ?? ''
            ];
        }

        return $data;
    }

    public static function findDuplicates(ThwordplayRequest|Array $thwordplayRequestOrDataArray, $excludeId = null)
    {
        return [];
    }
}
