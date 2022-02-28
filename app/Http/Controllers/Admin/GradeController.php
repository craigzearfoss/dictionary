<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use \Illuminate\Http\Request;

class GradeController extends BaseController
{
    /**
     * Display a listing of Grades.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($filter = $request->get('filter')) {
            $data = Grade::where('name', 'like', $filter)->orderBy('level', 'asc')->paginate($this->paginationValue);
        } else {
            $data = Grade::orderBy('level', 'asc')->paginate($this->paginationValue);
        }

        return view('admin.grade.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Display the specified Grade.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view('admin.grade.show', compact('grade'));
    }
}
