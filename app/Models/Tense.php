<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Tense extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'structure',
        'sample',
        'notes',
        'example1',
        'example2',
        'tense',
        'simple',
        'continuous',
        'perfect',
        'imperfect',
        'indicative',
        'imperative',
        'progressive'
    ];

    const TENSES = [
        1 => 'n/a',
        2 => 'past',
        3 => 'present',
        4 => 'future'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class)
            ->using(LanguageTense::class);
    }


    /**
     * Returns the options for a select list.
     *
     * @param int $languageId
     * @param string $labelField
     * @return array
     */
    public static function selectLanguageOptions($languageId, $labelField = 'name')
    {
        $data = [
            1 => ''
        ];
        foreach (self::where('language_id', $languageId)->orderBy('level')->get() as $row) {dd($row);
            $data[$row->id] = $row->{$labelField};
        };
dd($data);

        return self::whereNotNull('collins')
            ->orderBy($labelField, 'asc')
            ->get();

        return $data;
    }
}
