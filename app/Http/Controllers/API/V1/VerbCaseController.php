<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\VerbCaseRequest;
use App\Models\VerbCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerbCaseController extends BaseController
{
    /**
     * Return a listing of VerbCases.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return VerbCase::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified VerbCase.
     *
     * @param  VerbCase $verbCase
     * @return JsonResponse
     */
    public function show(VerbCase $verbCase)
    {
        return $verbCase;
    }
}
