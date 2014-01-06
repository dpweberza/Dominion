<?php

namespace DavidWeber\Dominion\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * A user that will be using this application.
 *
 * @author David Weber
 */
class User extends DominionModel implements UserInterface, RemindableInterface {

    public static $rules = array('username' => 'required|unique:users', 'password' => 'required|min:6', 'email_address' => 'email', 'role_id' => 'required|integer|not_in:0', 'status_id' => 'required|integer|not_in:0');
    protected $hidden = array('password');
    protected $fillable = array('username', 'password', 'email_address', 'status_id', 'role_id');

    //
    // Relations
    //
     public function role() {
        return $this->belongsTo('DavidWeber\Dominion\Models\Role');
    }

    //
    // Auth functions
    //
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getReminderEmail() {
        return $this->email_address;
    }

    //
    // Display Methods
    //

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    //
    // Getters and Setters
    //

    public function setPasswordAttribute($value) {
        if (!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

}
