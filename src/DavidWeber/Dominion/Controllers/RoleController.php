<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Role controller
 *
 * @author David
 */
class RoleController extends BaseController
{

    public function getIndex()
    {
        $roles = \DavidWeber\Dominion\Models\Role::all();
        return \View::make('dominion::pages.role.index', array('roles' => $roles));
    }

    public function getCreate()
    {
        return \View::make('dominion::pages.role.create');
    }

    public function postCreate()
    {
        $validator = \Validator::make(
        \Input::all(), array('name' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getCreate')->withInput();
        } else {
            $role = \DavidWeber\Dominion\Models\Role::create(\Input::all());
            \Notification::success('Created role: ' . $role->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getIndex');
        }
    }

    public function getEdit($id)
    {
        $role = \DavidWeber\Dominion\Models\Role::find($id);

        return \View::make('dominion::pages.role.edit', array('role' => $role));
    }

    public function postDelete($id)
    {
        $role = \DavidWeber\Dominion\Models\Role::find($id);
        $role->delete();

        \Notification::success('Deleted role: ' . $role->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\RoleController@getIndex');
    }

}