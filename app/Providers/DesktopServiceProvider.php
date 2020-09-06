<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DesktopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadTranslationsFrom(resource_path('desktop/lang'), 'desktop');

        $this->loadViewsFrom(resource_path('desktop/views'), 'desktop');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
