<?php

namespace DavidWeber\Dominion\Controllers;

use DavidWeber\Dominion\Models\UserRepositoryInterface as UserRepository;

/**
 * User controller
 *
 * @author David
 */
class UserController extends DominionController {

    public function __construct(UserRepository $repo) {
        $this->repo = $repo;

        parent::__construct();
    }

    public function getIndex() {
        \View::share('moduleGroups', \DavidWeber\Dominion\Models\ModuleGroup::all());
        $users = $this->repo->paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.user.index', array('users' => $users));
    }

    public function getCreate() {
        $roles = \DavidWeber\Dominion\Models\Role::all()->lists('name', 'id');
        $statuses = $this->repo->getStatuses();

        return \View::make('dominion::pages.user.create', array('roles' => $roles, 'statuses' => $statuses));
    }

    public function postCreate() {
        $validator = \Validator::make(
                        \Input::all(), $this->repo->getCreateRules()
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getCreate')->withInput();
        } else {
            $user = $this->repo->create(\Input::all());
            \Notification::success('Created user: ' . $user->username);
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
        }
    }

    public function getEdit($id) {
        $user = $this->repo->find($id);
        $roles = \DavidWeber\Dominion\Models\Role::all()->lists('name', 'id');
        $statuses = $this->repo->getStatuses();

        return \View::make('dominion::pages.user.edit', array('user' => $user, 'roles' => $roles, 'statuses' => $statuses));
    }

    public function postEdit($id) {
        $user = $this->repo->find($id);
        $newUsername = \Input::get('username');
        $isNewUsername = $newUsername != $user->username;

        $validator = \Validator::make(
                        \Input::except($isNewUsername ? : '', 'username'), $this->repo->getEditRules()
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getEdit', array('id' => $user->id))->withInput();
        } else {
            $user->update(\Input::except($isNewUsername ? '' : 'username'));

            \Notification::success('Updated user: ' . $user->username);
            return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
        }
    }

    public function postDelete($id) {
        $user = $this->repo->find($id);
        $user->delete();

        \Notification::success('Deleted user: ' . $user->username);
        return \Redirect::action('DavidWeber\Dominion\Controllers\UserController@getIndex');
    }

}
