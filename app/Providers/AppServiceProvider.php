<?php

namespace App\Providers;

use App\Models\Exercise;
use App\Observers\Exercise\AnswerObserver;
use App\Observers\Exercise\AudioObserver;
use App\Observers\Exercise\VideoObserver;
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
        Exercise::observe(VideoObserver::class);
        Exercise::observe(AudioObserver::class);
        Exercise::observe(AnswerObserver::class);
    }
}
