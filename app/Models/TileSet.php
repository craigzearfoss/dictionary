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
        'language_id',
        'num_tiles'
    ];

    /**
     * Get the Language that owns the TileSet.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    /**
     * Return the game Tiles for a TileSet.
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
     * Return the game Tiles for the specified Language.
     *
     * @param $languageId
     * @return array
     */
    public function getLanguageGameTiles($languageId)
    {
        if (!$tileSet = TileSet::where('language_id', $languageId)->first()) {
            return [];
        } else {
            return $this->getGameTiles($tileSet->id);
        }
    }
}
