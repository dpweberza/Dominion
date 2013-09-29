<?php

namespace DavidWeber\Dominion;

use Illuminate\Support\ServiceProvider;

class DominionServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        \View::addNamespace('dominion', array(app_path() . '/views/packages/david-weber/dominion'));
        $this->package('david-weber/dominion');

        include __DIR__ . '/../../routes.php';
        include __DIR__ . '/../../filters.php';
        include __DIR__ . '/../../validators.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app['notification'] = $this->app->share(function($app) {
            return new \DavidWeber\Dominion\Util\Notification\Notification;
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Notification', 'DavidWeber\Dominion\Facades\Notification');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}
