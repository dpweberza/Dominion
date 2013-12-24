<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;
use \DavidWeber\Dominion\Models\Role;
use \DavidWeber\Dominion\Models\Module;

/**
 * Roles seeder.
 *
 * @author David Weber
 */
class RoleTableSeeder extends Seeder {

    public function run() {
        \DB::table('roles')->delete();

        $role = Role::create(array(
                    'id' => 1,
                    'name' => 'Administrator'
        ));

        // Add all modules to the admin role
        $modules = Module::all();
        foreach ($modules as $module) {
            $role->modules()->attach($module->id);
        }

        $role = Role::create(array(
                    'id' => 2,
                    'name' => 'User'
        ));
    }

}
