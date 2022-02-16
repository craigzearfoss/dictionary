<?php

namespace App\Models;

use App\Http\Requests\ThwordRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public static function findDuplicates(ThwordRequest|Array $thwordRequestOrDataArray, $excludeId = null)
    {return [];
        $data = is_array($thwordRequestOrDataArray)
            ? $thwordRequestOrDataArray
            : $thwordRequestOrDataArray->all();

        $builder = self::where('term', $data['term'])
            ->where('pos_id', $data['pos_id'])
            ->where('collins_def', $data['collins_def']);

        if (!empty($excludeId)) {
            $builder->where('id', '!=', $excludeId);
        }

        return $builder->get();
    }
}
