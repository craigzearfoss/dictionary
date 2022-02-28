<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tile;
use App\Models\TileSet;
use \Illuminate\Http\Request;

class TileSetController extends BaseController
{
    /**
     * Display a listing of TileSets.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($filter = $request->get('filter')) {
           $data = TileSet::where('name', 'like', $filter)->orderBy('name', 'asc')->paginate($this->paginationValue);
       } else {
           $data = TileSet::orderBy('name', 'asc')->paginate($this->paginationValue);
       }

        return view('admin.tile_set.index', compact('data', 'filter'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified TileSet.
     *
     * @param TileSet $tileSet
     * @return \Illuminate\Http\Response
     */
    public function show(TileSet $tileSet)
    {
        $tileSet->tiles = Tile::where('tile_set_id', $tileSet->id)->orderBy('seq')->get();

        return view('admin.tile_set.show', compact('tileSet'));
    }
}
