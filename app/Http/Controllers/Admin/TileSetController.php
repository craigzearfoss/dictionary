<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tile;
use App\Models\TileSet;

class TileSetController extends BaseController
{
    /**
     * Display a listing of the Tile Set.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TileSet::orderBy('name', 'asc')->paginate($this->paginationValue);

        return view('admin.tile_set.index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Display the specified Tile Set.
     *
     * @param  TileSet $tileSet
     * @return \Illuminate\Http\Response
     */
    public function show(TileSet $tileSet)
    {
        $tileSet->tiles = Tile::where('tile_set_id', $tileSet->id)->orderBy('seq')->get();

        return view('admin.tile_set.show', compact('tileSet'));
    }
}
