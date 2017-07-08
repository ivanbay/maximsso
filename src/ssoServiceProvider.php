<?php

namespace mxm\sso;

use Illuminate\Support\ServiceProvider;

class ssoServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        
        $this->loadViewsFrom(__DIR__.'/views', 'SSO');
        
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
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('mxm\sso\controllers\SSOController');
        
        $this->mergeConfigFrom(__DIR__.'/config/sso.php', 'sso');
    }
}