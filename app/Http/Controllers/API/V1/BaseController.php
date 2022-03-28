<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

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
