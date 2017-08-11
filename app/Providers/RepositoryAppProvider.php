<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryAppProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\\Repository\\Contract\\IUserRepository', 'App\\Repository\\Actions\UserRepository');
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
