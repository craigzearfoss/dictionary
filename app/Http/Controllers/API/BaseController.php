<?php

namespace App\Http\Controllers\API;

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
     * @var int
     */
    protected $status = 201;

    /**
     * The default number of records to be returned on a request.
     *
     * @var int
     */
    protected $paginationValue = 15;
}
