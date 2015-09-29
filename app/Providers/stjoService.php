<?php

namespace stjo\Providers;

use Illuminate\Support\ServiceProvider;

class stjoService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(
            '*', '\stjo\Http\Composers\adminSidebarComposer'
        );
        view()->composer(
          '*', '\stjo\Http\Composers\publicSidebarComposer'
        );
        //dd('booting stjoService');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
