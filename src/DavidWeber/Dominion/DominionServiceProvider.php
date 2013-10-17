<?php

namespace DavidWeber\Dominion;

use Illuminate\Support\ServiceProvider;

class DominionServiceProvider extends ServiceProvider {

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
        $this->app->bind('DavidWeber\Dominion\Models\UserRepositoryInterface', 'DavidWeber\Dominion\Models\UserRepository');

        $this->app['notification'] = $this->app->share(function($app) {
            return new \DavidWeber\Dominion\Util\Notification\Notification;
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Notification', 'DavidWeber\Dominion\Facades\Notification');
        });
    }

}
