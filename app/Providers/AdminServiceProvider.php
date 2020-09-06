<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadTranslationsFrom(resource_path('admin/lang'), 'admin');

        $this->loadViewsFrom(resource_path('admin/views'), 'admin');
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
