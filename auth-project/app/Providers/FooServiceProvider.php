<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        var_dump('THEN: FooServiceProvider booting..');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        var_dump('FooServiceProvider registering..');
        var_dump('All other service providers will then register..');
    }
}
