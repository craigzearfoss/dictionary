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
        'gender_id',
        'plurality_id',
        'case_id'
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
     * Get the Plurality that owns the DefiniteArticle.
     */
    public function plurality()
    {
        return $this->belongsTo('App\Models\Plurality');
    }

    /**
     * Get the Case that owns the DefiniteArticle.
     */
    public function case()
    {
        return $this->belongsTo('App\Models\Case');
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

    /**
     * Returns an array of definite articles for the specified language.
     *
     * @param int $languageId
     * @param boolean $structured
     * @return array
     */
    public static function getLanguageArray($languageId, $structured = true)
    {
        // get the language
        if (!$language = Language::find($languageId)) {
            throw new \Exception("Language {$languageId} not found.");
        }

        // get the articles for the language
        $articles = self::select('*')->where('language_id', $languageId)->get();

        if (!$structured) {
            return $articles;
        }

        $array = [];

        if ($language->code == 'en') {

            foreach ($articles as $article) {
                if (!array_key_exists($article->plurality_id, $array)) {
                    $array[$article->plurality_id] = [];
                }
                $array[$article->plurality_id][] = $article->name;
            }

        } elseif ($language->code == 'de') {

            foreach ($articles as $article) {
                if (!array_key_exists($article->case_id, $array)) {
                    $array[$article->case_id] = [];
                }
                if (!array_key_exists($article->plurality_id, $array[$article->case_id])) {
                    $array[$article->case_id][$article->plurality_id] = [];
                }
                if (!array_key_exists($article->gender_id, $array[$article->case_id][$article->plurality_id])) {
                    $array[$article->case_id][$article->plurality_id][$article->gender_id] = [];
                }
                $array[$article->case_id][$article->plurality_id][$article->gender_id][] = $article->name;
            }

        } elseif (in_array($language->code, ['da', 'no', 'sv'])) {

            // Scandinavian
            foreach ($articles as $article) {
                if (!array_key_exists($article->gender_id, $array)) {
                    $array[$article->gender_id] = [];
                }
                $array[$article->gender_id][] = $article->name;
            }

        } else {

            // es, fr, etc.
            foreach ($articles as $article) {
                if (!array_key_exists($article->plurality_id, $array)) {
                    $array[$article->plurality_id] = [];
                }
                if (!array_key_exists($article->gender_id, $array[$article->plurality_id])) {
                    $array[$article->plurality_id][$article->gender_id] = [];
                }
                $array[$article->plurality_id][$article->gender_id][] = $article->name;
            }

        }

        return $array;
    }
}
