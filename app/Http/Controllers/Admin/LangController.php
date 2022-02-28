<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use \Illuminate\Http\Request;

class LangController extends BaseController
{
    /**
     * Display a listing of Langs.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Lang::where('short', 'like', $filter)->orderBy('short', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Lang::orderBy('short', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.lang.index', compact('data', 'filter'))
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
