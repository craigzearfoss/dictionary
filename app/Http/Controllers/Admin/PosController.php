<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pos;
use \Illuminate\Http\Request;

class PosController extends BaseController
{
    /**
     * Display a listing of Pos (Parts of Speech).
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Pos::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Pos::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.pos.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
