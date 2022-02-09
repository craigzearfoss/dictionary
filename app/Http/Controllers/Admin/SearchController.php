<?php

namespace App\Http\Controllers\Admin;

use \Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Pos;
use App\Models\Lang;
use App\Models\Term;

class SearchController extends BaseController
{
    /**
     * Display the main search page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $searchText = $request->get('text');
        $searchField = $request->get('field');
        $pos = $request->get('pos');
        $lang = $request->get('lang');
        $category = $request->get('category');
        $grade = $request->get('grade');    // @TODO
        $dfields = ['term', 'definition', 'pos', 'category', 'grade', 'es-la', 'fr', 'de'];

        $searchFields = [
            'term'       => 'Term',
            'local'      => 'Local Term',
            'definition' => 'Definition',
            'sentence'   => 'Sentence'
        ];
        $partsOfSpeech = Pos::selectOptions();
        $langs = Lang::selectOptionsByAbbrev();
        $categories = Category::selectOptions();
        $grades = []; // @TODO

        if (!in_array($searchField, array_keys($searchFields))) {
            $searchField = 'term';
        }
        if (!in_array($pos, $partsOfSpeech)) {
            $pos = null;
        }
        if (!in_array($lang, array_keys($langs))) {
            $lang = null;
        }
        if (!in_array($category, $categories)) {
            $category = null;
        }

        return view('admin.search.index', compact(
            'searchText', 'searchField', 'pos', 'lang', 'category', 'grade', 'dfields',
            'searchFields', 'partsOfSpeech', 'langs', 'categories', 'grades'
        ));
    }
}
