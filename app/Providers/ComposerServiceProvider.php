<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['front.index'], 'App\Http\ViewComposers\AsideComposer');
        View::composer(['front.partials.asideart'], 'App\Http\ViewComposers\AsideartComposer');
    }
}
