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
        'processed',
        'processed_at',
        'skipped',
        'skipped_at',
        'verified',
        'verified_at',
        'languaged_id'
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    /**
     * Get the Language that owns the TermTodo.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
