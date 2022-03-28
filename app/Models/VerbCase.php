<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class VerbCase extends BaseModel
{
    use HasFactory;

    protected $table = 'cases';

    protected $fillable = [
        'name',
        'role',
        'description'
    ];
}
