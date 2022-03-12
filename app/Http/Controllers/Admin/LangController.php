<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use \Illuminate\Http\Request;

class LangController extends BaseController
{
    /**
     * Display a listing of Languages.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Language::where('short', 'like', $filter)->orderBy('short', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Language::orderBy('short', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.language.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang   = new Language();
        $action = route('api.v1.language.store');
        $method = 'post';

        return view('admin.language.edit', compact('language', 'action', 'method'));
    }

    /**
     * Display the specified Language.
     *
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified Language.
     *
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $action = route('api.v1.language.update', $language->id);
        $method = 'put';
        return view('admin.language.edit', compact('language', 'action', 'method'));
    }
}
