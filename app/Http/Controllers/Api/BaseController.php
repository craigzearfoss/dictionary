<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

/**
 *
 */
class BaseController extends Controller
{
    /**
     * Standardized response array.
     *
     * @var array
     */
    protected $response = [
        'success' => 0,
        'message' => null,
        'errors'  => [],
        'data'    => []
    ];


    /**
     * Response status code.
     *
     * @var in
     */
    protected $status = 201;

    protected $pagination_value = 15;

    protected function ajaxResponse($status = 201)
    {
        return response()->json($this->response, $status);
    }
}
