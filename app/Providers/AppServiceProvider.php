<?php

namespace App\Providers;

use App\Models\Term;
use App\Models\TermTodo;
use App\Models\Thword;
use App\Models\Thwordplay;
use App\Observers\TermObserver;
use App\Observers\TermTodoObserver;
use App\Observers\ThwordObserver;
use App\Observers\ThwordplayObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Term::observe(TermObserver::class);
        TermTodo::observe(TermTodoObserver::class);
        Thword::observe(ThwordObserver::class);
        Thwordplay::observe(ThwordplayObserver::class);
    }
}
