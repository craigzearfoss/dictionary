<?php

namespace App\Http\Controllers\API\V1;

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
     * The default number of records to be returned on a request.
     *
     * @var int
     */
    protected $paginationValue = 25;
}
