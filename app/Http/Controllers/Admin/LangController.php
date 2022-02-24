<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;

class LangController extends BaseController
{
    /**
     * Display a listing of Langs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lang::orderBy('short', 'asc')->paginate($this->paginationValue);

        return view('admin.lang.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new Lang.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = new Lang();
        $action = route('api.v1.lang.store');
        $method = 'post';

        return view('admin.lang.edit', compact('lang', 'action', 'method'));
    }

    /**
     * Display the specified Lang.
     *
     * @param  Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        return view('admin.lang.show', compact('lang'));
    }

    /**
     * Show the form for editing the specified Lang.
     *
     * @param  Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lang $lang)
    {
        $action = route('api.v1.lang.update', $lang->id);
        $method = 'put';
        return view('admin.lang.edit', compact('lang', 'action', 'method'));
    }
}
