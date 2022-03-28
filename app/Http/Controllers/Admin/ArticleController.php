<?php

namespace App\Http\Controllers\Admin;

use App\Models\DefiniteArticle;
use App\Models\IndefiniteArticle;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends BaseController
{
    /**
     * Display a listing of Articles (Definite and Indefinite).
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
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
            'pluralities.name AS plurality_name',
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

        $allArticles = $definiteArticles->union($indefiniteArticles)->orderBy('language_name', 'asc')->get();

        $data = [];
        foreach ($allArticles as $article) {
            if (!array_key_exists($article->language_id, $data)) {
                $data[$article->language_id] = [
                    'id' => $article->language_id,
                    'code' => $article->language_code,
                    'name' => $article->language_name,
                    'definite' => [],
                    'indefinite' => []
                ];
            }
        }

        foreach ($allArticles as $article) {
            $data[$article->language_id][$article->type][] = $article;
        }

        return view('admin.article.index', compact('data'));
    }

    public function show($languageIdOrCode)
    {
        if (intval($languageIdOrCode) == $languageIdOrCode) {
            if (!$language = Language::where('id', $languageIdOrCode)->where('primary', 1)->first()) {
                throw new \Exception("Language {$languageIdOrCode} not found.");
            }
            $languageId = $language->id;
        } else {
            if (!$language = Language::where('code', $languageIdOrCode)->where('primary', 1)->first()) {
                throw new \Exception("Language code '{$languageIdOrCode}' not found.");
            }
            $languageId = $language->id;
        }

        $data = [
            'definite'   => DefiniteArticle::getLanguageArray($languageId),
            'indefinite' => IndefiniteArticle::getLanguageArray($languageId)
        ];
        $keys = $this->getArticleKeys();
//dd($data);
        return view('admin.article.show', compact(
            'language',
            'data',
            'keys'
        ));
    }

    protected function getArticleKeys()
    {
        $keys = [
            'none' => 1
        ];

        foreach (\App\Models\VerbCase::selectOptions() as $id=>$name) {
            if (!empty($name)) {
                $keys[$name] = $id;
            }
        }

        foreach (\App\Models\Plurality::selectOptions() as $id=>$name) {
            if (!empty($name)) {
                $keys[$name] = $id;
            }
        }

        foreach (\App\Models\Gender::selectOptions() as $id=>$name) {
            if (!empty($name)) {
                $keys[$name] = $id;
            }
        }

        return $keys;
    }
}
