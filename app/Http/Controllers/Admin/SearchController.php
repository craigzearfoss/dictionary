<?php

namespace App\Http\Controllers\Admin;

use \Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Grade;
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
        $posId = $request->get('pos_id');
        $langId = $request->get('lang_id');
        $categoryId = $request->get('category_id');
        $gradeId = $request->get('grade_id');
        $dfields = ['term', 'definition', 'pos', 'es-la', 'fr', 'de'];

        $partsOfSpeech = Pos::selectOptions();
        $langs = Lang::selectOptions('short');
        $langsByAbbrev = Lang::selectOptionsByAbbrev();
        $categories = Category::selectOptions();
        $grades = Grade::selectOptions();

        $searchFields = [
            'term'       => 'Term',
            'local'      => 'Local Term',
            'definition' => 'Definition',
            'sentence'   => 'Sentence'
        ];
        foreach ($langsByAbbrev as $abbrev=>$short) {
            $searchFields['LANG_' . str_replace('-', '_', $abbrev)] = $short;
        }

        if (!in_array($searchField, array_keys($searchFields))) {
            $searchField = 'term';
        }
        if (!in_array($posId, array_keys($partsOfSpeech))) {
            $posId = null;
        }
        if (!in_array($langId, array_keys($langs))) {
            $langId = null;
        }
        if (!in_array($categoryId, array_keys($categories))) {
            $categoryId = null;
        }
        if (!in_array($gradeId, array_keys($grades))) {
            $gradeId = null;
        }

        return view('admin.search.index', compact(
            'searchText', 'searchField', 'posId', 'langId', 'categoryId', 'gradeId', 'dfields',
            'searchFields', 'partsOfSpeech', 'langs', 'langsByAbbrev', 'categories', 'grades'
        ));
    }
}
