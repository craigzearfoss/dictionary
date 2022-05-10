<?php

namespace App\Http\Controllers\Admin;

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
     * The default number of records to be returned on a request.
     *
     * @var int
     */
    protected $paginationValue = 25;
}
