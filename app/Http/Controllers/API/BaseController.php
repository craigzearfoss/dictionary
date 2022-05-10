<?php

namespace App\Http\Controllers\API;

use App\Models\Language;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

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
