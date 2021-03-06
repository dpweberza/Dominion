<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Module controller
 *
 * @author David
 */
class ModuleController extends DominionController {

    public function getIndex() {
        $modules = \DavidWeber\Dominion\Models\Module::with('group')->paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.module.index', array('modules' => $modules));
    }

    public function getCreate() {
        $moduleGroups = \DavidWeber\Dominion\Models\ModuleGroup::all()->lists('name', 'id');
        $statuses = \DavidWeber\Dominion\Models\User::$statuses;

        return \View::make('dominion::pages.module.create', array('moduleGroups' => $moduleGroups, 'statuses' => $statuses));
    }

    public function postCreate() {
        $validator = \Validator::make(
                        \Input::all(), \DavidWeber\Dominion\Models\Module::$createRules, array('class' => 'The :attribute is not a valid class.')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleController@getCreate')->withInput();
        } else {
            $module = \DavidWeber\Dominion\Models\Module::create(\Input::all());
            \Notification::success('Created module: ' . $module->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleController@getIndex');
        }
    }

    public function getEdit($id) {
        $module = \DavidWeber\Dominion\Models\Module::find($id);
        $moduleGroups = \DavidWeber\Dominion\Models\ModuleGroup::all()->lists('name', 'id');
        $statuses = \DavidWeber\Dominion\Models\User::$statuses;

        return \View::make('dominion::pages.module.edit', array('module' => $module, 'moduleGroups' => $moduleGroups, 'statuses' => $statuses));
    }

    public function postEdit($id) {
        $module = \DavidWeber\Dominion\Models\Module::find($id);

        $validator = \Validator::make(
                        \Input::all(), \DavidWeber\Dominion\Models\Module::$editRules, array('class' => 'The :attribute is not a valid class.')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleController@getEdit', array('id' => $module->id))->withInput();
        } else {
            $module->update(\Input::all());
            \Notification::success('Updated module: ' . $module->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleController@getIndex');
        }
    }

    public function postDelete($id) {
        $module = \DavidWeber\Dominion\Models\Module::find($id);
        $module->delete();

        \Notification::success('Deleted module group: ' . $module->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\ModuleController@getIndex');
    }

}
