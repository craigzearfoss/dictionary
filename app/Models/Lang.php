<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'directionality',
        'local',
        'wiki',
        'full',
        'short',
        'abbrev',
        'enabled'
    ];

    const DIRECTIONALITIES = [
        'ltr',
        'rtl'
    ];
}
