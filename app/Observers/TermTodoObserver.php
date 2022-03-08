<?php

namespace App\Observers;

use App\Models\TermTodo;
use Illuminate\Support\Facades\DB;

class TermTodoObserver
{
    /**
     * Handle the TermTodo "created" event.
     *
     * @param  \App\Models\TermTodo  $termTodo
     * @return void
     */
    public function created(TermTodo $termTodo)
    {
        //
    }

    /**
     * Handle the TermTodo "updated" event.
     *
     * @param  \App\Models\TermTodo  $termTodo
     * @return void
     */
    public function updated(TermTodo $termTodo)
    {
        //
    }

    /**
     * Handle the TermTodo "deleted" event.
     *
     * @param  \App\Models\TermTodo  $termTodo
     * @return void
     */
    public function deleted(TermTodo $termTodo)
    {
        //
    }

    /**
     * Handle the Term "restored" event.
     *
     * @param  \App\Models\TermTodo  $termTodo
     * @return void
     */
    public function restored(TermTodo $termTodo)
    {
        //
    }

    /**
     * Handle the TermTodo "force deleted" event.
     *
     * @param  \App\Models\TermTodo  $termTodo
     * @return void
     */
    public function forceDeleted(TermTodo $termTodo)
    {
        //
    }
}
