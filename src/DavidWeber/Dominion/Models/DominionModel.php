<?php

namespace DavidWeber\Dominion\Models;

/**
 * Base model to extend for auditing functionality
 *
 * @author David Weber
 */
class DominionModel extends \Eloquent {

    public static $rules = array();
    public static $statuses = array(1 => 'Active', 2 => 'Inactive'); // TODO remove statics

    public function getStatuses() {
        return self::$statuses;
    }

    public function getValidationRules() {
        return self::$rules;
    }

    public function getStatus() {
        return self::$statuses[$this->status_id];
    }

    public function getCreateDate() {
        return $this->created_at->format('d M Y H:i');
    }

    public function getUpdateDate() {
        return $this->updated_at->format('d M Y H:i');
    }

    public function isActive() {
        return $this->status_id == 1;
    }

    public function scopeActive($query) {
        return $query->where('status_id', '=', 1);
    }

    public static function boot() {
        parent::boot();

        // Setup event bindings...

        static::saving(function($model) {
            //return $model->validate();
        });

        static::created(function($model) {
            // return static::createActionlogEntry('created', $model);
        });

        static::updated(function($model) {
            // return static::createActionlogEntry('updated', $model);
        });

        static::deleted(function($model) {
            //return static::createActionlogEntry('deleted', $model);
        });
    }

}
