<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Admin package controller
 *
 * @author David
 */
class AdminController extends DominionController {

    public function getIndex() {
        $users = \DavidWeber\Dominion\Models\User::orderBy('created_at', 'desc')->limit(5)->get();
        return \View::make('dominion::pages.index', array('users' => $users));
    }

    public function getLogin() {
        return \View::make('dominion::pages.login');
    }

    public function postLogin() {
        $credentials = array(
            'username' => \Input::get('username'),
            'password' => \Input::get('password')
        );
        $authenticated = \Auth::attempt($credentials);
        if ($authenticated) {
            return \Redirect::to('admin');
        } else {
            \Notification::error('Login failed, please try again.');
            return \Redirect::to('admin/login');
        }
    }

    public function getLogout() {
        \Auth::logout();
        return \Redirect::to('admin/login');
    }

}
