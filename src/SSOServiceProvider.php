<?php

namespace Maxim\SSO;

use Illuminate\Support\ServiceProvider;

class SSOServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
//        $this->loadRoutesFrom(__DIR__.'/routes.php');
        
        $this->loadViewsFrom(__DIR__.'/views', 'SSO');
//        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        
        $this->publishes([
            __DIR__.'/config/sso.php' => config_path('sso.php')
        ], 'config');
        
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/sso')
        ], 'views');
        
        $this->publishes([
           __DIR__.'/migrations' => database_path('migrations') 
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Maxim\SSO\controllers\SSOController');
        
        $this->mergeConfigFrom(__DIR__.'/config/sso.php', 'sso');
    }
}
