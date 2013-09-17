<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;
use DavidWeber\Dominion\Models\ModuleGroup;

/**
 * Module groups seeder.
 *
 * @author David Weber
 */
class ModuleGroupTableSeeder extends Seeder
{

    public function run()
    {
        \DB::table('module_groups')->delete();

        ModuleGroup::create(array(
            'name' => 'System',
            'icon_class' => 'glyphicon glyphicon-wrench'
        ));
    }

}