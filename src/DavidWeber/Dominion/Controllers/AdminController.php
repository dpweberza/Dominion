<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Admin package controller
 *
 * @author David
 */
class AdminController extends BaseController
{

    public function getIndex()
    {
        return \View::make('dominion::pages.index');
    }

    public function getLogin()
    {
        return \View::make('dominion::pages.login');
    }

    public function postLogin()
    {
        $credentials = array(
            'email' => \Input::get('email'),
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

    public function getLogout()
    {
        \Auth::logout();
        return \Redirect::to('admin/login');
    }

}