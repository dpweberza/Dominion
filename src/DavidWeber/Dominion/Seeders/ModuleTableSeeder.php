<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;
use \DavidWeber\Dominion\Models\Module;

/**
 * Modules seeder.
 *
 * @author David Weber
 */
class ModuleTableSeeder extends Seeder {

    public function run() {
        \DB::table('modules')->delete();

        Module::create(array(
            'id' => 1,
            'name' => 'Users',
            'controller' => 'DavidWeber\Dominion\Controllers\UserController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
        Module::create(array(
            'id' => 2,
            'name' => 'Roles',
            'controller' => 'DavidWeber\Dominion\Controllers\RoleController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
        Module::create(array(
            'id' => 3,
            'name' => 'Modules',
            'controller' => 'DavidWeber\Dominion\Controllers\ModuleController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
        Module::create(array(
            'id' => 4,
            'name' => 'Log Viewer',
            'controller' => 'DavidWeber\Dominion\Controllers\LogController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
        Module::create(array(
            'id' => 5,
            'name' => 'Module Groups',
            'controller' => 'DavidWeber\Dominion\Controllers\ModuleGroupController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
        Module::create(array(
            'id' => 6,
            'name' => 'Select Groups',
            'controller' => 'DavidWeber\Dominion\Controllers\SelectGroupController',
            'status_id' => 1,
            'module_group_id' => 1
        ));
    }

}
