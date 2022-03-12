<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Language extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'directionality',
        'local',
        'wiki',
        'full',
        'short',
        'abbrev',
        'active'
    ];

    const DIRECTIONALITIES = [
        'ltr',
        'rtl'
    ];

    /**
     * Returns the options for a select list.
     *
     * @param string $labelField
     * @param bool $activeOnly
     * @return array
     */
    public static function selectOptions($labelField = 'short', $activeOnly = true)
    {
        $data = [];
        foreach (collect(self::all()->toArray())->sortBy($labelField) as $row) {
            if (!$activeOnly || !!$row['active']) {
                $data[$row['id']] = $row[$labelField];
            }
    };

        return $data;
    }

    /**
     * Returns the options for a select list with the abbrev as the key.
     *
     * @param bool $activeOnly
     * @return array
     */
    public static function selectOptionsByAbbrev($labelField = 'short', $activeOnly = true)
    {
        $data = [];
        foreach (collect(self::all()->toArray())->sortBy($labelField) as $row) {
            if (!$activeOnly || !!$row['active']) {
                $data[$row['abbrev']] = $row[$labelField];
            }
        }

        return $data;
    }

    public static function getCollinsLanguages($labelField = 'short')
    {
        return self::whereNotNull('collins')
            ->orderBy($labelField, 'asc')
            ->get();
    }

    public static function abbrevs($active = true, $primary = true)
    {
        $builder = self::select('abbrev')
            ->distinct('abbrev')
            ->whereNotNull('abbrev');

        if ($active) {
            $builder->where('active', 1);
        }
        if ($primary) {
            $builder->where('primary', 1);
        }

        return $builder->orderBy('abbrev', 'asc')
            ->get()
            ->pluck('abbrev');
    }

    public static function codes($active = true)
    {
        $builder = self::select('code')
            ->distinct('code')
            ->whereNotNull('code');

        if ($active) {
            $builder->where('active', 1);
        }

        return $builder->orderBy('code', 'asc')
            ->get()
            ->pluck('code');
    }

    public static function collins()
    {
        return self::select('collins')
            ->distinct('collins')
            ->whereNotNull('collins')
            ->orderBy('collins', 'asc')
            ->get()
            ->pluck('collins');
    }

    public static function families()
    {
        return self::select('family')
            ->distinct('family')
            ->whereNotNull('family')
            ->orderBy('family', 'asc')
            ->get()
            ->pluck('family');
    }

    public static function regions()
    {
        return self::select('region')
            ->distinct('region')
            ->whereNotNull('region')
            ->orderBy('region', 'asc')
            ->get()
            ->pluck('region');
    }
}
