<?php

namespace DavidWeber\Dominion\Models;

/**
 * Assigned to a role and grants access to a selection of routes.
 *
 * @author David Weber
 */
class Module extends DominionModel {

    public static $createRules = array('name' => 'required|min:5', 'controller' => 'required|min:5|class', 'module_group_id' => 'required|integer|not_in:0', 'status_id' => 'required|integer|not_in:0');
    public static $editRules = array('name' => 'required|min:5', 'controller' => 'required|min:5|class', 'module_group_id' => 'required|integer|not_in:0', 'status_id' => 'required|integer|not_in:0');
    protected $fillable = array('name', 'controller', 'module_group_id', 'status_id');

    public function group() {
        return $this->belongsTo('\DavidWeber\Dominion\Models\ModuleGroup', 'module_group_id');
    }

    public function roles() {
        return $this->belongsToMany('Role', 'role_modules')->withTimestamps();
    }

    public function delete() {
        \DB::table('role_modules')->where('module_id', '=', $this->id)->delete();

        return parent::delete();
    }

}
