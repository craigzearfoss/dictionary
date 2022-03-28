<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\PluralityRequest;
use App\Models\Plurality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PluralityController extends BaseController
{
    /**
     * Return a listing of Pluralities.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Plurality::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified Plurality.
     *
     * @param  Plurality $plurality
     * @return JsonResponse
     */
    public function show(Plurality $plurality)
    {
        return $plurality;
    }
}
