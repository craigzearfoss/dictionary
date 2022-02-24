<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\TileSetRequest;
use App\Models\TileSet;
use App\Models\Tile;

class TileSetController extends BaseController
{
    /**
     * Return a listing of the TileSets.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TileSet::orderBy('id', 'asc')->paginate($this->paginationValue);
    }

    /**
     * Return the specified TileSet.
     *
     * @param  TileSet $tileSet
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TileSet $tileSet)
    {
        $tileSet->tiles = Tile::where('tile_set_id', $tileSet->id)->orderBy('seq')->get();

        return $tileSet;
    }

    /**
     * Return the Tiles for the specified TileSet. The TileSet can be specified by the two-letter
     * language abbreviation.
     *
     * @param $key
     * @return array
     */
    public function tiles($key)
    {
        if (intval($key) == $key) {

            $tiles = (new TileSet())->getGameTiles($key);

        } else {

            if ($tileSet = TileSet::where('abbrev', $key)->first()) {
                $tiles = (new TileSet())->getGameTiles($tileSet->id);
            } else {
                $tiles = [];
            }
        }

        return $tiles;
    }
}
