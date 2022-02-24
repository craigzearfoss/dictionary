<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;

class GradeController extends BaseController
{
    /**
     * Return a listing of Grades.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Grade::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Grade.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Grade $grade)
    {
        return $grade;
    }
}
