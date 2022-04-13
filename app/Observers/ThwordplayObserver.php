<?php

namespace App\Observers;

use App\Models\Thwordplay;
use Illuminate\Support\Facades\DB;

class ThwordplayObserver
{
    /**
     * Handle the Thwordplay "created" event.
     *
     * @param  \App\Models\Thwordplay  $thwordplay
     * @return void
     */
    public function created(Thwordplay $thwordplay)
    {
        //
    }

    /**
     * Handle the Thwordplay "updated" event.
     *
     * @param  \App\Models\Thwordplay  $thwordplay
     * @return void
     */
    public function updated(Thwordplay $thwordplay)
    {
        //
    }

    /**
     * Handle the Thwordplay "deleted" event.
     *
     * @param  \App\Models\Thwordplay  $thwordplay
     * @return void
     */
    public function deleted(Thwordplay $thwordplay)
    {
        //
    }

    /**
     * Handle the Thwordplay "restored" event.
     *
     * @param  \App\Models\Thwordplay  $thwordplay
     * @return void
     */
    public function restored(Thwordplay $thwordplay)
    {
        //
    }

    /**
     * Handle the Thwordplay "force deleted" event.
     *
     * @param  \App\Models\Thwordplay  $thwordplay
     * @return void
     */
    public function forceDeleted(Thwordplay $thwordplay)
    {
        //
    }

    /**
     * Handle the Thwordplay "saving" event.
     *
     * @param Thwordplay $thwordplay
     * @return void
     * @throws \Exception
     */
    public function saving(Thwordplay $thwordplay)
    {
        $thwordplay->subject = trim($thwordplay->subject);
        $thwordplay->title = trim($thwordplay->title);
        $thwordplay->description = trim($thwordplay->description);

        // get the array of synonyms
        $synonyms = $thwordplay->synonyms;
        if (!is_array($synonyms)) {
            if (false !== strpos($synonyms, '|')) {
                $synonyms = explode('|', $synonyms);
            } else {
                $synonyms = explode(PHP_EOL, $synonyms);
            }
        }
        $synonyms = array_values(array_filter(
            array_map(function($v) { return trim($v); }, $synonyms),
            function($v) { return !empty($v); }
        ));

        // get the array of antonyms
        $antonyms = $thwordplay->antonyms;
        if (!is_array($antonyms)) {
            if (false !== strpos($antonyms, '|')) {
                $antonyms = explode('|', $antonyms);
            } else {
                $antonyms = explode(PHP_EOL, $antonyms);
            }
        }
        $antonyms = array_values(array_filter(
            array_map(function($v) { return trim($v); }, $antonyms),
            function($v) { return !empty($v); }
        ));

        // get the array of bonuses
        $bonuses = $thwordplay->bonuses;
        if (!is_array($bonuses)) {
            if (false !== strpos($bonuses, '|')) {
                $bonuses = explode('|', $bonuses);
            } else {
                $bonuses = explode(PHP_EOL, $bonuses);
            }
        }
        $bonuses = array_values(array_filter(
            array_map(function($v) { return trim($v); }, $bonuses),
            function($v) { return !empty($v); }
        ));

        // set the synonyms, antonyms, terms and bonuses fields
        $thwordplay->synonyms = implode('|', $synonyms);
        $thwordplay->antonyms = implode('|', $antonyms);
        $thwordplay->terms = json_encode( $thwordplay->terms);
        $thwordplay->bonuses = json_encode($bonuses);
    }
}
