<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Role controller
 *
 * @author David
 */
class RoleController extends DominionController {

    public function getIndex() {
        $roles = \DavidWeber\Dominion\Models\Role::paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.role.index', array('roles' => $roles));
    }

    public function getCreate() {
        $modules = \DavidWeber\Dominion\Models\Module::all();

        return \View::make('dominion::pages.role.create', array('modules' => $modules));
    }

    public function postCreate() {
        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getCreate')->withInput();
        } else {
            $role = \DavidWeber\Dominion\Models\Role::create(\Input::all());
            foreach (\Input::get('roleModules', array()) as $moduleId)
                $role->modules()->attach($moduleId);

            \Notification::success('Created role: ' . $role->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getIndex');
        }
    }

    public function getEdit($id) {
        $role = \DavidWeber\Dominion\Models\Role::find($id);
        $modules = \DavidWeber\Dominion\Models\Module::all();

        return \View::make('dominion::pages.role.edit', array('role' => $role, 'modules' => $modules));
    }

    public function postEdit($id) {
        $role = \DavidWeber\Dominion\Models\Role::find($id);

        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getCreate')->withInput();
        } else {
            $role->update(\Input::all());
            $role->modules()->detach();
            foreach (\Input::get('roleModules', array()) as $moduleId)
                $role->modules()->attach($moduleId);

            \Notification::success('Updated role: ' . $role->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getIndex');
        }
    }

    public function postDelete($id) {
        $role = \DavidWeber\Dominion\Models\Role::find($id);
        $role->delete();

        \Notification::success('Deleted role: ' . $role->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getIndex');
    }

}
