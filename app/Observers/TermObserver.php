<?php

namespace App\Observers;

use App\Models\Term;
use App\Models\TermTodo;
use Illuminate\Support\Facades\DB;

class TermObserver
{
    /**
     * Handle the Term "created" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function created(Term $term)
    {
        //
    }

    /**
     * Handle the Term "updated" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function updated(Term $term)
    {
        //
    }

    /**
     * Handle the Term "deleted" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function deleted(Term $term)
    {
        //
    }

    /**
     * Handle the Term "restored" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function restored(Term $term)
    {
        //
    }

    /**
     * Handle the Term "force deleted" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function forceDeleted(Term $term)
    {
        //
    }

    /**
     * Handle the Term "saved" event.
     *
     * @param  \App\Models\Term  $term
     * @return void
     */
    public function saved(Term $term)
    {
        // if the term is in the to-do list then mark it as processed
        $builder = DB::table('term_todos')
            ->select(['id'])
            ->whereIn('term', [$term->term, $term->en_uk])
            ->where('processed', 0)->where('skipped', 0)->where('verified', 0);

        if ($row = $builder->first()) {
            DB::table('term_todos')
                ->where('id', $row->id)
                ->update([
                    'processed' => 1,
                    'processed_at' => date("Y-m-d H:i:s")
                ]);
        }
    }
}
