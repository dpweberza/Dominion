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

    protected $hidden = array('password');
    protected $fillable = array('email', 'password', 'status_id', 'role_id');

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
        return $this->email;
    }

    //
    // Getters and Setters
    //

    public function setPasswordAttribute($value) {
        if (!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

}
