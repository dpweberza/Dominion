<?php

namespace DavidWeber\Dominion\Models;

/**
 * Assigned to a role and grants access to a selection of routes.
 *
 * @author David Weber
 */
class Module extends DominionModel {

    protected $fillable = array('name', 'controller', 'module_group_id');

    public function group() {
        return $this->belongsTo('\DavidWeber\Dominion\Models\ModuleGroup', 'module_group_id');
    }

    public function roles() {
        return $this->belongsToMany('Role', 'role_modules')->withTimestamps();
    }

}
