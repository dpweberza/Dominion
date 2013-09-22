<?php

namespace DavidWeber\Dominion\Models;

/**
 * Assigned to a user and grants access to a selection of modules.
 *
 * @author David Weber
 */
class Role extends \Eloquent {

    protected $fillable = array('name');

    public function modules() {
        return $this->belongsToMany('DavidWeber\Dominion\Models\Module', 'role_modules')->withTimestamps();
    }

}
