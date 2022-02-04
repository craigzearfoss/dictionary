<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;

class LangController extends \App\Http\Controllers\Admin\BaseController
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lang.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        return view('admin.lang.show', compact('lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lang $lang)
    {
        return view('admin.lang.edit', compact('lang'));
    }
}
