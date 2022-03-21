<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Language;
use App\Models\Plurality;
use App\Models\Tense;
use App\Models\Translations\De;
use App\Models\Translations\Es;
use App\Models\Translations\Fr;
use Illuminate\Http\Request;

class TranslateController extends BaseController
{
    protected $langCodes = [];

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->langCodes = Language::codes()->toArray();
    }

    /**
     * Display a listing of Languages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::where('primary', 1)->where('active', 1)->orderBy('short', 'asc')->get();
        return view('admin.translate.home', compact('languages'));
    }

    /**
     * Display a listing of Languages.
     *
     * @param String $langCode
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function langIndex($langCode, Request $request)
    {
        if (!in_array($langCode, $this->langCodes)) {
            die("Invalid language {$langCode}.");
        }

        $language = Language::getLanguageByCode($langCode);

        $langModel = 'App\Models\Translations\\' . ucfirst($langCode);
        if ($filter = $request->get('filter')) {
            $data = $langModel::where('word', 'like', $filter)->orderBy('word', 'asc')->paginate($this->paginationValue);
        } else {
            $data = $langModel::orderBy('word', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.translate.index', compact('language', 'data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Display the specified Translation.
     *
     * @param String $langCode
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($langCode, $id)
    {
        if (!in_array($langCode, $this->langCodes)) {
            die("Invalid language {$langCode}.");
        }

        $language = Language::getLanguageByCode($langCode);

        $langModel = 'App\Models\Translations\\' . ucfirst($langCode);
        $translation = $langModel::find($id);

        return view('admin.translate.show', compact('language', 'translation'));
    }

    /**
     * Show the form for editing the specified Translation.
     *
     * @param String $langCode
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($langCode, $id)
    {
        if (!in_array($langCode, $this->langCodes)) {
            die("Invalid language {$langCode}.");
        }

        $language = Language::getLanguageByCode($langCode);

        $translation = Es::find($id);

        $action      = route('api.v1.term.update', $id);
        $method      = 'put';
        $genders     = Gender::selectOptions();
        $pluralities = Plurality::selectOptions();
        $tenses      = Tense::selectOptions();


        return view('admin.translate.edit', compact(
            'language',
            'translation',
            'action',
            'method',
            'genders',
            'pluralities',
            'tenses'
        ));
    }
}
