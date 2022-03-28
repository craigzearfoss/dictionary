<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends BaseController
{
    /**
     * Return a listing of Grades.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Grade::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified Grade.
     *
     * @param  Grade $grade
     * @return JsonResponse
     */
    public function show(Grade $grade)
    {
        return $grade;
    }
}
