<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class IndefiniteArticle extends DefiniteArticle
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'name',
        'gender_id',
        'plurality_id',
        'case_id'
    ];

    /**
     * Returns the IndefiniteArticles for the specified Language id.
     *
     * @param int $languageId
     * @return mixed
     */
    public static function getByLanguageId($languageId)
    {
        return self::select([
                'indefinite_articles.id',
                'indefinite_articles.name',
                'genders.name as gender'
            ])
            ->join('genders', 'genders.id', '=', 'indefinite_articles.gender_id')
            ->where('language_id', $languageId)
            ->orderBy('indefinite_articles.name', 'asc')
            ->get();
    }

    /**
     * Returns the IndefiniteArticles for the specified Language code.
     *
     * @param string $languageCode
     * @return mixed
     */
    public static function getByLanguageCode($languageCode)
    {
        return self::select([
                'indefinite_articles.id',
                'indefinite_articles.name',
                'genders.name as gender'
            ])
            ->from('languages')
            ->join('indefinite_articles', 'indefinite_articles.language_id', '=', 'languages.id')
            ->join('genders', 'genders.id', '=', 'indefinite_articles.gender_id')
            ->where('languages.code', $languageCode)
            ->where('languages.primary', 1)
            ->orderBy('indefinite_articles.name', 'asc')
            ->get();
    }

    /**
     * Returns the IndefiniteArticles for the specified Gender id.
     *
     * @param int $genderId
     * @return mixed
     */
    public static function getByGenderId($genderId)
    {
        return self::select([
                'indefinite_articles.id',
                'indefinite_articles.name',
                'languages.code',
                'languages.short AS language'
            ])
            ->from('genders')
            ->join('indefinite_articles', 'indefinite_articles.gender_id', '=', 'genders.id')
            ->join('languages', 'languages.id', '=', 'indefinite_articles.language_id')
            ->where('genders.id', $genderId)
            ->where('languages.primary', 1)
            ->orderBy('languages.name', 'asc')
            ->get();
    }
}
