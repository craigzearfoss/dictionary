<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TileRequest;
use App\Models\Tile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TileController extends BaseController
{
    /**
     * Return a listing of the Tiles.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return Tile::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified Tile.
     *
     * @param  Tile $tile
     * @return JsonResponse
     */
    public function show(Tile $tile)
    {
        return $tile;
    }
}
