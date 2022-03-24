<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CollinsTag;
use App\Models\Grade;
use App\Models\Pos;
use App\Models\Language;
use App\Models\Term;
use \Illuminate\Http\Request;

class TermController extends BaseController
{
    /**
     * Display a listing of Terms.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Term::where('term', 'like', $filter)
                ->orWhere('collins_en_uk', 'like', $filter)
                ->orderBy('term', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Term::orderBy('term', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.term.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Term.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $term            = new Term();
        $action          = route('api.v1.term.store');
        $method          = 'post';
        $partsOfSpeech   = Pos::selectOptions();
        $categories      = Category::selectOptions();
        $grades          = Grade::selectOptions();
        $languages       = Language::getCollinsLanguages();
        $languageOptions = Language::selectOptionsByAbbrev('full');
        $collinsTags     = CollinsTag::selectOptions();
        $showTab         = 'Field Input Form';

        return view('admin.term.import', compact(
            'term',
            'action',
            'method',
            'partsOfSpeech',
            'categories',
            'grades',
            'languages',
            'languageOptions',
            'collinsTags',
            'showTab'
        ));
    }

    /**
     * Display the specified Term.
     *
     * @param  Term $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        $languageOptions = Language::selectOptionsByCode();
        $collinsLanguages = Language::getCollinsLanguages();

        return view('admin.term.show', compact('term', 'languageOptions', 'collinsLanguages'));
    }

    /**
     * Show the form for editing the specified Term.
     *
     * @param  Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        $action             = route('api.v1.term.update', $term->id);
        $method             = 'put';
        $partsOfSpeech      = Pos::selectOptions();
        $categories         = Category::selectOptions();
        $grades             = Grade::selectOptions();
        $languagesByRegion  = Language::getLanguagesByRegion();
        $languages          = Language::getLanguages();
        $languageOptions    = Language::selectOptionsByCode('full');
        $collinsTags        = CollinsTag::selectOptions();
        $googleCodes        = Language::googleCodes();
        $cambridgeLanguages = Language::getLanguagesByCambridge();
        $bablaLanguages     = Language::getLanguagesByBabla();

        $initialTranslations = [];
        foreach ($languages as $language) {
            $initialTranslations[$language->code] = [];
            foreach ($term->{$language->code} as $translation) {
                $initialTranslations[$language->code][] = [
                    "id"   => $translation->id,
                    "word" => $translation->word
                ];
            }
        }

        return view('admin.term.edit', compact(
            'term',
            'action',
            'method',
            'partsOfSpeech',
            'categories',
            'grades',
            'languagesByRegion',
            'languages',
            'languageOptions',
            'googleCodes',
            'cambridgeLanguages',
            'bablaLanguages',
            'collinsTags',
            'initialTranslations'
        ));
    }

    /**
     * Show the import for creating a new Term.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $term               = new Term();
        $action             = route('api.v1.term.store');
        $method             = 'post';
        $partsOfSpeech      = Pos::selectOptions();
        $categories         = Category::selectOptions();
        $grades             = Grade::selectOptions();
        $languages          = Language::getCollinsLanguages();
        $languageOptions    = Language::selectOptionsByAbbrev('full');
        $collinsCodes       = Language::collinsCode();
        $googleCodes        = Language::googleCodes();
        $cambridgeLanguages = Language::getLanguagesByCambridge();
        $bablaLanguages     = Language::getLanguagesByBabla();
        $showTab            = 'Cut-and-Paste Form';

        return view('admin.term.import', compact(
            'term',
            'action',
            'method',
            'partsOfSpeech',
            'categories',
            'grades',
            'languages',
            'languageOptions',
            'collinsCodes',
            'googleCodes',
            'cambridgeLanguages',
            'bablaLanguages',
            'showTab'
        ));
    }
}
