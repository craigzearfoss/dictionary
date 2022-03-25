<?php

namespace App\Http\Controllers\Admin;

use App\Models\DefiniteArticle;
use App\Models\IndefiniteArticle;
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
            'genders.name AS gender_name'
        ])
            ->leftJoin('languages', 'languages.id', '=', 'definite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'definite_articles.gender_id')
            ->where('languages.primary', 1);

        $indefiniteArticles = IndefiniteArticle::select([
            'indefinite_articles.id AS id',
            'indefinite_articles.name AS name',
            DB::raw("'indefinite' AS type"),
            'languages.id AS language_id',
            'languages.code AS language_code',
            'languages.short AS language_name',
            'genders.id AS gender_id',
            'genders.name AS gender_name'
        ])
            ->leftJoin('languages', 'languages.id', '=', 'indefinite_articles.language_id')
            ->leftJoin('genders', 'genders.id', '=', 'indefinite_articles.gender_id')
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
}
