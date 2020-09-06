<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MobileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadTranslationsFrom(resource_path('mobile/lang'), 'mobile');

        $this->loadViewsFrom(resource_path('mobile/views'), 'mobile');
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
