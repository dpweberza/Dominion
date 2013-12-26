<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Module group controller
 *
 * @author David
 */
class ModuleGroupController extends DominionController {

    public function getIndex() {
        $moduleGroups = \DavidWeber\Dominion\Models\ModuleGroup::with('modules')->paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.modulegroup.index', array('moduleGroups' => $moduleGroups));
    }

    public function postDelete($id) {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);
        $moduleGroup->delete();

        \Notification::success('Deleted module group: ' . $moduleGroup->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex');
    }

    public function getCreate() {
        return \View::make('dominion::pages.modulegroup.create');
    }

    public function postCreate() {
        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4', 'icon_class' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getCreate')->withInput();
        } else {
            $role = \DavidWeber\Dominion\Models\ModuleGroup::create(\Input::all());
            \Notification::success('Created module group: ' . $role->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex');
        }
    }

    public function getEdit($id) {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);

        return \View::make('dominion::pages.modulegroup.edit', array('moduleGroup' => $moduleGroup));
    }

    public function postEdit($id) {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);

        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4', 'icon_class' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getEdit', array('id' => $moduleGroup->id))->withInput();
        } else {
            $moduleGroup->update(\Input::all());
            \Notification::success('Updated module group: ' . $moduleGroup->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex');
        }
    }

    public function getView($id) {
        $moduleGroup = \DavidWeber\Dominion\Models\ModuleGroup::find($id);
        return \View::make('dominion::pages.modulegroup.view', array('moduleGroup' => $moduleGroup));
    }

}
