<?php

namespace App\Http\Controllers\Admin;

use App\Models\VerbCase;
use \Illuminate\Http\Request;

class VerbCaseController extends BaseController
{
    /**
     * Display a listing of VerbCases.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = VerbCase::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = VerbCase::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.verb_case.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
