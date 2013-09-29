<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * User controller
 *
 * @author David
 */
class UserController extends DominionController {

    public function getIndex() {
        \View::share('moduleGroups', \DavidWeber\Dominion\Models\ModuleGroup::all());
        $users = \DavidWeber\Dominion\Models\User::paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.user.index', array('users' => $users));
    }

    public function getCreate() {
        $roles = \DavidWeber\Dominion\Models\Role::all()->lists('name', 'id');
        $statuses = \DavidWeber\Dominion\Models\User::$statuses;

        return \View::make('dominion::pages.user.create', array('roles' => $roles, 'statuses' => $statuses));
    }

    public function postCreate() {
        $validator = \Validator::make(
                \Input::all(), array('email' => 'required|email|unique:users', 'password' => 'required|min:6', 'role_id' => 'required|integer|not_in:0', 'status_id' => 'required|integer|not_in:0')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getCreate')->withInput();
        } else {
            $user = \DavidWeber\Dominion\Models\User::create(\Input::all());
            \Notification::success('Created user: ' . $user->email);
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
        }
    }

    public function getEdit($id) {
        $user = \DavidWeber\Dominion\Models\User::find($id);
        $roles = \DavidWeber\Dominion\Models\Role::all()->lists('name', 'id');
        $statuses = \DavidWeber\Dominion\Models\User::$statuses;

        return \View::make('dominion::pages.user.edit', array('user' => $user, 'roles' => $roles, 'statuses' => $statuses));
    }

    public function postEdit($id) {
        $user = \DavidWeber\Dominion\Models\User::find($id);

        $validator = \Validator::make(
                \Input::all(), array('email' => 'required|email|unique:users,' . $id, 'password' => 'min:6', 'role_id' => 'required|integer|not_in:0', 'status_id' => 'required|integer|not_in:0')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getEdit', array('id' => $user->id))->withInput();
        } else {
            $user->update(\Input::all());
            \Notification::success('Updated user: ' . $user->email);
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
        }
    }

    public function postDelete($id) {
        $user = \DavidWeber\Dominion\Models\User::find($id);
        $user->delete();

        \Notification::success('Deleted user: ' . $user->email);
        return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
    }

}
