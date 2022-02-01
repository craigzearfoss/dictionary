<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
        'definition',
        'sentence',
        'en_us',
        'en_uk',
        'ar',
        'cs',
        'da',
        'de',
        'el',
        'es_es',
        'es_la',
        'fi',
        'fr',
        'hr',
        'it',
        'ja',
        'ko',
        'nl',
        'no',
        'pl',
        'pt_br',
        'pt_pt',
        'ro',
        'ru',
        'sv',
        'th',
        'tr',
        'uk',
        'vi',
        'zh'
    ];

    protected $validationRules = [
        'pt_br'      => 'max:255',
        'pt_pt'      => 'max:255',
        'ro'         => 'max:255',
        'ru'         => 'max:255',
        'sv'         => 'max:255',
        'th'         => 'max:255',
        'tr'         => 'max:255',
        'uk'         => 'max:255',
        'vi'         => 'max:255',
        'zh'         => 'max:255'
    ];

}
