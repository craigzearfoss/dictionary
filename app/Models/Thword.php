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
        return json_decode($this->getAttribute('synonyms'));
    }

    public function getAntonyms()
    {
        return json_decode($this->getAttribute('antonyms'));
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function($model) {
            $model->synonyms = self::prepareJsonField($model->synonyms);
            $model->antonyms = self::prepareJsonField($model->antonyms);
        });

        self::saved(function($model) {
            self::addNewWordsToTodoList(array_merge(
                [$model->getAttribute('subject')],
                json_decode($model->getAttribute('synonyms')),
                json_decode($model->getAttribute('antonyms'))
            ));
        });
    }

    protected static function prepareJsonField($value)
    {
        if (is_array($value)) {

            $array = $value;

        } else {

            $value = trim($value);
            json_decode($value);
            if (json_last_error() === JSON_ERROR_NONE) {

                $array = json_decode($value);

            } else {

                if (empty($value)) {
                    $array = [];
                } else {
                    if (false !== strpos($value, '|')) {
                        $array = explode('|', $value);
                    } else {
                        $array = explode(PHP_EOL, $value);
                    }
                }
            }
        }

        // trim all values and remove empty ones
        $array = array_values(array_filter(
            array_map(function($v) { return trim($v); }, $array),
            function($v) { return !empty($v); }
        ));

        return json_encode($array);
    }

    protected static function addNewWordsToTodoList($words)
    {
        try {
            $builder = DB::table('terms')
                ->select(['term'])
                ->whereIn('term', $words)
                ->orWhereIn('en_uk', $words);
            foreach ($builder->get() as $row) {
                if (false !== $key = array_search($row->term, $words)) {
                    unset($words[$key]);
                }
            }

            foreach (array_values($words) as $word) {
                TermTodo::create([
                    'term'         => $word,
                    'processed'    => 0,
                    'processed_at' => date("Y-m-d H:m:s")
                ]);
            }

        } catch (\Exception $e) {
            // ignore the exception because it is not critical
            return false;
        }

        return true;
    }

    public static function findDuplicates(ThwordRequest|Array $thwordRequestOrDataArray, $excludeId = null)
    {
        return [];
    }
}
