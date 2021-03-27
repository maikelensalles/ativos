<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ContratoUserSaqueObserver;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\Observers\ContratoUserObserver;
use App\UserGestore;
use App\Observers\UserGestoreObserver;

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
        ContratoUserSaque::observe(ContratoUserSaqueObserver::class);
        ContratoUser::observe(ContratoUserObserver::class);
        UserGestore::observe(UserGestoreObserver::class);
    }
}
