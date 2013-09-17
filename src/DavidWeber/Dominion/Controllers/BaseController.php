<?php

namespace DavidWeber\Dominion\Controllers;

use \Illuminate\Routing\Controllers\Controller;

/**
 * Abstract admin package controller
 *
 * @author David
 */
class BaseController extends Controller
{

    public function __construct()
    {
        $user = \Auth::user();
        if ($user) {
            $userModules = \Auth::user()->role->modules->sortBy(function($module) {
                return $module->name;
            });

            $userModuleGroups = array();
            foreach ($userModules as $module) {
                if (!isset($userModuleGroups[$module->module_group_id]))
                    $userModuleGroups[$module->module_group_id] = $module->group;
            }

            \View::share('userModuleGroups', $userModuleGroups);
            \View::share('userModules', $userModules);
        }
    }

}