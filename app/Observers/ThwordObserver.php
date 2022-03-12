<?php

namespace App\Observers;

use App\Models\TermTodo;
use App\Models\Thword;
use Illuminate\Support\Facades\DB;

class ThwordObserver
{
    /**
     * Handle the Thword "created" event.
     *
     * @param  \App\Models\Thword  $thword
     * @return void
     */
    public function created(Thword $thword)
    {
        //
    }

    /**
     * Handle the Thword "updated" event.
     *
     * @param  \App\Models\Thword  $thword
     * @return void
     */
    public function updated(Thword $thword)
    {
        //
    }

    /**
     * Handle the Thword "deleted" event.
     *
     * @param  \App\Models\Thword  $thword
     * @return void
     */
    public function deleted(Thword $thword)
    {
        //
    }

    /**
     * Handle the Thword "restored" event.
     *
     * @param  \App\Models\Thword  $thword
     * @return void
     */
    public function restored(Thword $thword)
    {
        //
    }

    /**
     * Handle the Thword "force deleted" event.
     *
     * @param  \App\Models\Thword  $thword
     * @return void
     */
    public function forceDeleted(Thword $thword)
    {
        //
    }

    /**
     * Handle the Thword "saving" event.
     *
     * @param Thword $thword
     * @return void
     * @throws \Exception
     */
    public function saving(Thword $thword)
    {
        $thword->subject = trim($thword->subject);
        $thword->title = trim($thword->title);
        $thword->description = trim($thword->description);

        // get the array of synonyms
        $synonyms = $thword->synonyms;
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
        $antonyms = $thword->antonyms;
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

        // create an array for the terms and their corresponding dictionary ids
        $allTerms = array_values(array_unique(array_merge([$thword->subject], $synonyms, $antonyms)));
        $existingTerms = $thword->terms;
        if (empty($existingTerms)) {
            $terms = [];
        } else {
            json_decode($existingTerms);
            if (json_last_error() === JSON_ERROR_NONE) {
                $terms = json_decode($existingTerms, true);
            } else {
                throw new \Exception('Invalid json specified in terms field.');
            }
        }

        foreach ($allTerms as $term) {
            if (false !== $key = array_search($term, array_column($terms, 'term'))) {
                $terms[$key]['term'] = $term;
            } else {
                $terms[] = [
                    'term' => $term,
                    'id'   => -1
                ];
            }
        }

        // set the synonyms, antonyms and terms fields
        $thword->synonyms = implode('|', $synonyms);
        $thword->antonyms = implode('|', $antonyms);
        $thword->terms = json_encode($terms);
    }

    /**
     * Handle the Thword "saved" event.
     *
     * @param Thword $thword
     * @return void
     */
    public function saved(Thword $thword)
    {
        $allTerms = array_merge(
            [$thword->subject],
            explode('|', $thword->synonyms),
            explode('|', $thword->antonyms)
        );

        try {
            $builder = DB::table('terms')
                ->select(['term'])
                ->whereIn('term', $allTerms)
                ->orWhereIn('en_uk', $allTerms);
            foreach ($builder->get() as $row) {
                if (false !== $key = array_search($row->term, $allTerms)) {
                    unset($allTerms[$key]);
                }
            }

            foreach (array_values($allTerms) as $term) {
                TermTodo::create([
                    'term'         => $term,
                    'processed'    => 0,
                    'processed_at' => date("Y-m-d H:m:s"),
                    'skipped'      => 0,
                    'notes'        => '',
                    'language_id'  =>$thword->language_id
                ]);
            }

        } catch (\Exception $e) {
            // ignore the exception because it is not critical
        }
    }
}
