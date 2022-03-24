<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Language extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'primary',
        'parent_id',
        'abbrev',
        'collins',
        'short',
        'full',
        'code',
        'google',
        'name',
        'directionality',
        'local',
        'wiki',
        'active',
        'speakers',
        'region',
        'family',
        'iso6391',
        'iso6392t',
        'iso6392b',
        'iso6393',
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

    /**
     * Returns the options for a select list with the code as the key.
     * (Note that this only returns primary languages.)
     *
     * @return array
     */
    public static function selectOptionsByCode($labelField = 'short', $activeOnly = true)
    {
        $data = [];
        foreach (collect(self::where('primary', 1)->get()->toArray())->sortBy($labelField) as $row) {
            if (!$activeOnly || !!$row['active']) {
                $data[$row['code']] = $row[$labelField];
            }
        }

        return $data;
    }

    /**
     * Returns an array of languages.
     *
     * @param bool $includeInactive
     * @param string $labelField
     * @return array
     */
    public static function getLanguages($includeInactive = false, $labelField = 'short')
    {
        $builder = self::where('primary', 1)
            ->orderBy($labelField, 'asc');
        if (!$includeInactive) {
            $builder->where('active', 1);
        }

        return $builder->get();
    }

    /**
     * Returns an array of Collins languages.
     *
     * @param string $labelField
     * @return array
     */
    public static function getCollinsLanguages($labelField = 'short')
    {
        return self::whereNotNull('collins')
            ->orderBy($labelField, 'asc')
            ->get();
    }

    /**
     * Returns an array of language abbreviations.
     *
     * @param bool $active
     * @param bool $primary
     * @return array
     */
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

    /**
     * Returns an array of language codes.
     *
     * @param bool $active
     * @return array
     */
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

    /**
     * Returns an array of Collins language codes.
     *
     * @return array
     */
    public static function collinsCode()
    {
        return self::select('collins')
            ->distinct('collins')
            ->whereNotNull('collins')
            ->orderBy('collins', 'asc')
            ->get()
            ->pluck('collins')
            ->toArray();
    }

    /**
     * Returns an array of Google language codes.
     *
     * @return array
     */
    public static function googleCodes()
    {
        return self::select('google')
            ->distinct('google')
            ->whereNotNull('google')
            ->orderBy('google', 'asc')
            ->get()
            ->pluck('google')
            ->toArray();
    }

    /**
     * Returns an array of language families.
     *
     * @return array
     */
    public static function families()
    {
        return self::select('family')
            ->distinct('family')
            ->whereNotNull('family')
            ->orderBy('family', 'asc')
            ->get()
            ->pluck('family');
    }

    /**
     * Returns an array of Collins language regions.
     *
     * @return array
     */
    public static function regions()
    {
        return self::select('region')
            ->distinct('region')
            ->whereNotNull('region')
            ->orderBy('region', 'asc')
            ->get()
            ->pluck('region');
    }

    /**
     * Returns a language from the specified language code.
     *
     * @param string $code
     * @return array
     */
    public static function getLanguageByCode($code)
    {
        return self::select('*')
            ->where('code', $code)
            ->where('primary', 1)
            ->first();
    }

    /**
     * Returns an array of languages by region.
     *
     * @param bool $includeInactive
     * @return array
     */
    public static function getLanguagesByRegion($includeInactive = false)
    {
        $languagesByRegion = [
            'European'       => [],
            'Asian'          => [],
            'Middle Eastern' => []
        ];

        $builder = self::select('*')
            ->where('primary', 1);
        if (!$includeInactive) {
            $builder->where('active', 1);
        }

        foreach ($builder->get() as $language) {
            if (!array_key_exists($language->region, $languagesByRegion)) {
                $languagesByRegion[$language->region] = [$language];
            } else {
                $languagesByRegion[$language->region][] = $language;
            }
        }

        return $languagesByRegion;
    }

    /**
     * Returns an array of Cambridge languages.
     *
     * @param string $labelField
     * @return array
     */
    public static function getLanguagesByCambridge($labelField = 'short')
    {
        $results = [];

        $builder = self::select(['cambridge', $labelField])
            ->whereNotNull('cambridge')
            ->orderBy($labelField, 'asc')
            ->first();

        foreach ($builder->get() as $language) {
            if (!empty($language->cambridge)) {
                $results[$language->cambridge] = $language->{$labelField};
            }
        }

        return $results;
    }

    /**
     * Returns an array of bab.la languages.
     *
     * @param string $labelField
     * @return array
     */
    public static function getLanguagesByBabla($labelField = 'short')
    {
        $results = [];

        $builder = self::select(['babla', $labelField])
            ->whereNotNull('babla')
            ->orderBy($labelField, 'asc')
            ->first();

        foreach ($builder->get() as $language) {
            if (!empty($language->babla)) {
                $results[$language->babla] = $language->{$labelField};
            }
        }

        return $results;
    }
}
