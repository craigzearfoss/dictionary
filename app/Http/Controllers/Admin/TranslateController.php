<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LangEs;
use App\Models\Language;
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
        return view('admin.translate.index', compact('languages'));
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

        if ($filter = $request->get('filter')) {
            $data = LangEs::where('word', 'like', $filter)->orderBy('word', 'asc')->paginate($this->paginationValue);
        } else {
            $data = LangEs::orderBy('word', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.translate.lang_index', compact('language', 'data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
