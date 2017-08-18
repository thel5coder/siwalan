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
        $this->app->bind('App\\Repository\\Contract\\IMasterWaktuKerjaRepository', 'App\\Repository\\Actions\MasterWaktuKerjaRepository');
        $this->app->bind('App\\Repository\\Contract\\IKetenagaKerjaanUmumRepository', 'App\\Repository\\Actions\KetenagaKerjaanUmumRepository');
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
