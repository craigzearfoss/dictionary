<?php

namespace App\Http\Controllers\API\V1;

use App\Models\DefiniteArticle;
use App\Models\IndefiniteArticle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends BaseController
{
    /**
     * Return a listing of Articles (Both Definite and Indefinite).
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $definiteArticles = DefiniteArticle::select([
                'definite_articles.id AS id',
                'definite_articles.name AS name',
                DB::raw("'definite' AS type"),
                'languages.id AS language_id',
                'languages.code AS language_code',
                'languages.short AS language_name',
                'genders.id AS gender_id',
                'genders.name AS gender_name',
                'pluralities.id AS plurality_id',
                'genders.name AS plurality_name',
                'cases.id AS case_id',
                'cases.name AS case_name'
            ])
            ->leftJoin('languages', 'languages.id', '=', 'definite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'definite_articles.gender_id')
            ->leftJoin('pluralities', 'pluralities.id', '=', 'definite_articles.plurality_id')
            ->leftJoin('cases', 'cases.id', '=', 'definite_articles.case_id')
            ->where('languages.primary', 1);

        $indefiniteArticles = IndefiniteArticle::select([
                'indefinite_articles.id AS id',
                'indefinite_articles.name AS name',
                DB::raw("'indefinite' AS type"),
                'languages.id AS language_id',
                'languages.code AS language_code',
                'languages.short AS language_name',
                'genders.id AS gender_id',
                'genders.name AS gender_name',
                'pluralities.id AS plurality_id',
                'pluralities.name AS plurality_name',
                'cases.id AS case_id',
                'cases.name AS case_name'
            ])
            ->leftJoin('languages', 'languages.id', '=', 'indefinite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'indefinite_articles.gender_id')
            ->leftJoin('pluralities', 'pluralities.id', '=', 'indefinite_articles.plurality_id')
            ->leftJoin('cases', 'cases.id', '=', 'indefinite_articles.case_id')
            ->where('languages.primary', 1);

        $allArticles = $definiteArticles->union($indefiniteArticles)->get();

        $articles = [];
        foreach ($allArticles as $article) {
            if (!array_key_exists($article->language_id, $articles)) {
                $articles[$article->language_id] = [
                    'id' => $article->language_id,
                    'code' => $article->language_code,
                    'name' => $article->language_name,
                    'definite' => [],
                    'indefinite' => []
                ];
            }
        }

        foreach ($allArticles as $article) {
            $articles[$article->language_id][$article->type][] = $article;
        }

        return $articles;
    }

    /**
     * Return a listing of DefiniteArticles.
     *
     * @return JsonResponse
     */
    public function definite()
    {
        return DefiniteArticle::select([
                'definite_articles.id',
                'definite_articles.name',
                'languages.id AS language_id',
                'languages.code AS language_code',
                'languages.short AS language_name',
                'genders.id AS gender_id',
                'genders.name AS gender_name',
                'pluralities.id AS plurality_id',
                'pluralities.name AS plurality_name',
                'cases.id AS case_id',
                'cases.name AS case_name'
            ])
            ->leftJoin('languages', 'languages.id', '=', 'definite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'definite_articles.gender_id')
            ->leftJoin('pluralities', 'pluralities.id', '=', 'definite_articles.plurality_id')
            ->leftJoin('cases', 'cases.id', '=', 'definite_articles.case_id')
            ->where('languages.primary', 1)
            ->orderBy('definite_articles.id', 'asc')
            ->paginate($this->paginationValue);
    }

    /**
     * Return a listing of IndefiniteArticles.
     *
     * @return JsonResponse
     */
    public function indefinite()
    {
        return IndefiniteArticle::select([
                'indefinite_articles.id',
                'indefinite_articles.name',
                'languages.id AS language_id',
                'languages.code AS language_code',
                'languages.short AS language_name',
                'genders.id AS gender_id',
                'genders.name AS gender_name',
                'pluralities.id AS plurality_id',
                'pluralities.name AS plurality_name',
                'cases.id AS case_id',
                'cases.name AS case_name'
            ])
            ->leftJoin('languages', 'languages.id', '=', 'indefinite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'indefinite_articles.gender_id')
            ->leftJoin('pluralities', 'pluralities.id', '=', 'indefinite_articles.plurality_id')
            ->leftJoin('cases', 'cases.id', '=', 'indefinite_articles.case_id')
            ->where('languages.primary', 1)
            ->orderBy('indefinite_articles.id', 'asc')
            ->paginate($this->paginationValue);
    }

    /**
     * Return a listing of DefiniteArticles for the specified Language id or code.
     *
     * @return JsonResponse
     */
    public function definiteByLanguageIdOrCode($languageIdOrCode)
    {
        if (intVal($languageIdOrCode) == $languageIdOrCode) {
            return DefiniteArticle::getByLanguageId($languageIdOrCode);
        } else {
            return DefiniteArticle::getByLanguageCode($languageIdOrCode);
        }
    }

    /**
     * Return a listing of IndefiniteArticles for the specified Language id or code.
     *
     * @return JsonResponse
     */
    public function indefiniteByLanguageIdOrCode($languageIdOrCode)
    {
        if (intVal($languageIdOrCode) == $languageIdOrCode) {
            return IndefiniteArticle::getByLanguageId($languageIdOrCode);
        } else {
            return IndefiniteArticle::getByLanguageCode($languageIdOrCode);
        }
    }

    /**
     * Return a listing of DefiniteArticles for a Language for the specified Gender id.
     *
     * @return JsonResponse
     */
    public function definiteByGenderId($genderId)
    {
        return DefiniteArticle::getByGenderId($genderId);
    }

    /**
     * Return a listing of IndefiniteArticles for a Language for the specified Gender id.
     *
     * @return JsonResponse
     */
    public function indefiniteByGenderId($genderId)
    {
        return IndefiniteArticle::getByGenderId($genderId);
    }
}
