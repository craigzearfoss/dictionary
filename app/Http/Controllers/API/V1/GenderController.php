<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\GenderRequest;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenderController extends BaseController
{
    /**
     * Return a listing of Genders.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Gender::orderBy('id', 'asc')->get();
    }

    /**
     * Return the specified Gender.
     *
     * @param  Gender $gender
     * @return JsonResponse
     */
    public function show(Gender $gender)
    {
        return $gender;
    }
}
