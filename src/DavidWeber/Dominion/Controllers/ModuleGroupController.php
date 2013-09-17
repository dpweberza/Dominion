<?php

namespace DavidWeber\Dominion\Controllers;

use \Illuminate\Routing\Controllers\Controller;

/**
 * Module group controller
 *
 * @author David
 */
class ModuleGroupController extends BaseController
{

    public function getIndex()
    {
        $moduleGroups = \DavidWeber\Dominion\Models\ModuleGroup::with('modules')->get();
        return \View::make('dominion::pages.modulegroup.index', array('moduleGroups' => $moduleGroups));
    }

    public function postDelete($id)
    {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);
        $moduleGroup->delete();

        \Notification::success('Deleted module group: ' . $moduleGroup->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex');
    }

    public function getCreate()
    {
        return \View::make('dominion::pages.modulegroup.create');
    }

    public function getView($id)
    {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);
        return \View::make('dominion::pages.modulegroup.view', array('moduleGroup' => $moduleGroup));
    }

}