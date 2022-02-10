<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;

class GradeController extends BaseController
{
    /**
     * Display a listing of the Grade.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Grade::orderBy('level', 'asc')->paginate($this->paginationValue);

        return view('admin.grade.index', compact('data'))
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
