<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plurality;
use \Illuminate\Http\Request;

class PluralityController extends BaseController
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
            $data = Plurality::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Plurality::orderBy('name', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.plurality.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
