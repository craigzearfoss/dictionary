<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
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
