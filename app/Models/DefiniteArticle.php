<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class DefiniteArticle extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'name',
        'gender_id'
    ];

    /**
     * Get the Language that owns the DefiniteArticle.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    /**
     * Get the Gender that owns the DefiniteArticle.
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    /**
     * Returns the DefiniteArticles for the specified Language id.
     *
     * @param int $languageId
     * @return mixed
     */
    public static function getByLanguageId($languageId)
    {
        return self::select([
                'definite_articles.id',
                'definite_articles.name',
                'genders.name as gender'
            ])
            ->join('genders', 'genders.id', '=', 'definite_articles.gender_id')
            ->where('language_id', $languageId)
            ->orderBy('definite_articles.name', 'asc')
            ->get();
    }

    /**
     * Returns the DefiniteArticles for the specified Language code.
     *
     * @param string $languageCode
     * @return mixed
     */
    public static function getByLanguageCode($languageCode)
    {
        return self::select([
            'definite_articles.id',
            'definite_articles.name',
            'genders.name as gender'
        ])
            ->from('languages')
            ->join('definite_articles', 'definite_articles.language_id', '=', 'languages.id')
            ->join('genders', 'genders.id', '=', 'definite_articles.gender_id')
            ->where('languages.code', $languageCode)
            ->where('languages.primary', 1)
            ->orderBy('definite_articles.name', 'asc')
            ->get();
    }

    /**
     * Returns the DefiniteArticles for the specified Gender Id.
     *
     * @param int $genderId
     * @return mixed
     */
    public static function getByGenderId($genderId)
    {
        return self::select([
            'definite_articles.id',
            'definite_articles.name',
            'languages.code',
            'languages.short AS language'
        ])
            ->from('genders')
            ->join('definite_articles', 'definite_articles.gender_id', '=', 'genders.id')
            ->join('languages', 'languages.id', '=', 'definite_articles.language_id')
            ->where('genders.id', $genderId)
            ->where('languages.primary', 1)
            ->orderBy('languages.name', 'asc')
            ->get();
    }
}
