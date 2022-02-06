<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Pos;

class PosController extends BaseController
{
    /**
     * Return a listing of Pos (Parts of Speech).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Pos::orderBy('name', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Pos (Part of Speech).
     *
     * @param  Pos $pos
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Pos $pos)
    {
        return $pos;
    }

}
