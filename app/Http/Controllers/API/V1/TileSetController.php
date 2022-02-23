<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TileSetRequest;
use App\Models\TileSet;
use App\Models\Tile;

class TileSetController extends BaseController
{
    /**
     * Return a listing of the tile sets.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TileSet::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified tile set.
     *
     * @param  TileSet $tileSet
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TileSet $tileSet)
    {
        $tileSet->tiles = Tile::where('tile_set_id', $tileSet->id)->orderBy('seq')->get();

        return $tileSet;
    }
}
