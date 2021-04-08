<?php


namespace ShahriarSiraj\LaravelI18n;

use Illuminate\Routing\Router;
use ShahriarSiraj\LaravelI18n\Middleware\CheckLocale;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishes([
            __DIR__.'/../config/i18n.php' => config_path('i18n.php'),
        ]);

        $router->pushMiddlewareToGroup('web', CheckLocale::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/i18n.php',
            'i18n'
        );
    }
}
