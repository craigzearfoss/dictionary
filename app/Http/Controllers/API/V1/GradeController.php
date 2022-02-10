<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;

class Gradeontroller extends BaseController
{
    /**
     * Return a listing of the Grade.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Grade::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Grae.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Grade $grade)
    {
        return $grade;
    }
}
