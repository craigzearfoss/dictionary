<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pos;

class PosController extends BaseController
{
    /**
     * Display a listing of Pos (Parts of Speech).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pos::orderBy('name', 'asc')->paginate($this->paginationValue);

        return view('admin.pos.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Display the specified Pos (Part of Speech).
     *
     * @param  Pos $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Pos $pos)
    {
        return view('admin.pos.show', compact('pos'));
    }
}
