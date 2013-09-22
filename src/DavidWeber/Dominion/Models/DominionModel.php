<?php

namespace DavidWeber\Dominion\Models;

/**
 * Base model to extend for auditing functionality
 *
 * @author David Weber
 */
class DominionModel extends \Eloquent {

    public static function boot() {
        parent::boot();

        // Setup event bindings...

        static::saving(function($model) {
            return $model->validate();
        });

        static::created(function($model) {
            return static::createActionlogEntry('created', $model);
        });

        static::updated(function($model) {
            return static::createActionlogEntry('updated', $model);
        });

        static::deleted(function($model) {
            return static::createActionlogEntry('deleted', $model);
        });
    }

}
