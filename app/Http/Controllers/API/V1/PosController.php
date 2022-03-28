<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\PosRequest;
use App\Models\Pos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends BaseController
{
    /**
     * Return a listing of Pos (Parts of Speech).
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Pos::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified Pos (Part of Speech).
     *
     * @param  Pos $pos
     * @return JsonResponse
     */
    public function show(Pos $pos)
    {
        return $pos;
    }
}
