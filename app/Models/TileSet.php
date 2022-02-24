<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class TileSet extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'official',
        'lang_id',
        'num_tiles'
    ];

    /**
     * Get the Lang that owns the Tile Set.
     */
    public function lang()
    {
        return $this->belongsTo('App\Models\Lang');
    }

    /**
     * Return the Tiles for a Thword game.
     *
     * @param $tileSetId
     * @return array
     */
    public function getGameTiles($tileSetId)
    {
        $chars = Tile::select(['symbol', 'base_symbol', 'krow', 'kcol', 'value', 'cnt'])->where('tile_set_id', $tileSetId)->orderBy('seq')->get();

        $refArray = [];
        $tiles = [];
        foreach ($chars as $char) {
            if (false === $key = array_search($char['base_symbol'], $refArray)) {
                $refArray[] = $char['base_symbol'];
                $tiles[] = [
                    'label'   => $char['base_symbol'],
                    'matches' => [$char['symbol']],
                    'value'   => $char['value'],
                    'cnt'   => $char['cnt'],
                    'keyboard' => [$char['krow'], $char['kcol']]
                ];
            } else {
                $tiles[$key]['matches'][] = $char['symbol'];
            }
        }

        return $tiles;
    }

    /**
     * Return the Tiles for a Thword game for the specified Land.
     *
     * @param $langId
     * @return array
     */
    public function getLangGameTiles($langId)
    {
        if (!$tileSet = TileSet::where('lang_id', $langId)->first()) {
            return [];
        } else {
            return $this->getGameTiles($tileSet->id);
        }
    }
}
