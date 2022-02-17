<?php

namespace App\Models;

use App\Http\Requests\ThwordRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class TermTodo extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'term',
        'processed',
        'notes',
        'lang_id',
        'processed_ts'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the lang that owns the term todo.
     */
    public function lang()
    {
        return $this->belongsTo('App\Models\Lang');
    }
}
