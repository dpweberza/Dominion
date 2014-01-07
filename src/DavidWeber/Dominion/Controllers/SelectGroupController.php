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
            $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::create(\Input::all());
            \Notification::success('Created select group: ' . $selectGroup->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getIndex');
        }
    }

    public function postEdit($id) {
        $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::find($id);
        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getView', array('id' => $id, 'tab' => 'tab-edit'))->withInput();
        } else {
            $selectGroup->update(\Input::all());
            \Notification::success('Updated select group: ' . $selectGroup->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getView', array('id' => $id))->withInput();
        }
    }

    public function getView($id) {
        $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::find($id);
        return \View::make('dominion::pages.selectgroup.view', array('selectGroup' => $selectGroup));
    }

    public function getAddOption($id) {
        $selectGroup = \DavidWeber\Dominion\Models\SelectGroup::find($id);
        return \View::make('dominion::pages.selectgroup.addoption', array('selectGroup' => $selectGroup));
    }

    public function postAddOption($id) {
        $validator = \Validator::make(
                        \Input::all(), array('name' => 'required|min:4', 'value' => 'required', 'select_group_id' => 'required|integer|not_in:0')
        );
        if ($validator->fails()) {
            \Notification::error($validator->messages()->all());
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getAddOption', array('id' => $id, 'tab' => 'tab-edit'))->withInput();
        } else {
            $selectOption = \DavidWeber\Dominion\Models\SelectOption::create(\Input::all());
            \Notification::success('Created select option: ' . $selectOption->name);
            return \Redirect::action('DavidWeber\Dominion\Controllers\SelectGroupController@getView', array('id' => $id));
        }
    }

}