<?php

namespace App\Providers;

use App\Models\Term;
use App\Models\Thword;
use App\Observers\TermObserver;
use App\Observers\ThwordObserver;
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
        Thword::observe(ThwordObserver::class);
        Term::observe(TermObserver::class);
    }
}
