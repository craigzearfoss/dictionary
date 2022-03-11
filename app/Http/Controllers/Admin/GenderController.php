<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gender;
use \Illuminate\Http\Request;

class GenderController extends BaseController
{
    /**
     * Display a listing of Genders.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Gender::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Gender::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.gender.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
