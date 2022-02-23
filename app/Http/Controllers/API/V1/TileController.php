<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TileRequest;
use App\Models\Tile;

class TileController extends BaseController
{
    /**
     * Return a listing of the tiles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Tile::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified tile.
     *
     * @param  Tile $tile
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tile $tile)
    {
        return $tile;
    }
}
