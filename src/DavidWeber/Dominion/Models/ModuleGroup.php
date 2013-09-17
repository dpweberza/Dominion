<?php

namespace DavidWeber\Dominion\Models;

/**
 * Assigned to a module and grants access to a route.
 *
 * @author David Weber
 */
class ModuleGroup extends \Eloquent
{

    protected $table = 'module_groups';
    protected $fillable = array('name', 'icon_class');

    public function modules()
    {
        return $this->hasMany('\DavidWeber\Dominion\Models\Module');
    }

}