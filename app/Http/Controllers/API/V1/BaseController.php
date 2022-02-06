<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

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
