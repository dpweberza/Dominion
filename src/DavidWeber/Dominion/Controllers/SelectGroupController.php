<?php

namespace DavidWeber\Dominion\Controllers;

/**
 * Select group controller
 *
 * @author David
 */
class SelectGroupController extends DominionController {

    public function getIndex() {
        $selectGroups = \DavidWeber\Dominion\Models\SelectGroup::with('options')->paginate(\Config::get('dominion::setting-page-size'));
        return \View::make('dominion::pages.selectgroup.index', array('selectGroups' => $selectGroups));
    }

    public function postDelete($id) {
        $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::find($id);
        $selectGroup->delete();

        \Notification::success('Deleted select group: ' . $selectGroup->name);
        return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getIndex');
    }

    public function getCreate() {
        return \View::make('dominion::pages.selectgroup.create');
    }

    public function postCreate() {
        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getCreate')->withInput();
        } else {
            $role = \DavidWeber\Dominion\Models\SelectGroup::create(\Input::all());
            \Notification::success('Created select group: ' . $role->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getIndex');
        }
    }

    public function getView($id) {
        $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::find($id);
        return \View::make('dominion::pages.selectgroup.view', array('selectGroup' => $selectGroup));
    }

}
