<?php

namespace DavidWeber\Dominion\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * A user that will be using this application.
 *
 * @author David Weber
 */
class User extends \Eloquent implements UserInterface, RemindableInterface
{

    public static $statuses = array(1 => 'Active', 2 => 'Inactive');
    protected $hidden = array('password');
    protected $fillable = array('email', 'password', 'status_id', 'role_id');

    public function getStatus()
    {
        return self::$statuses[$this->status_id];
    }

    public function isActive()
    {
        return $this->status_id == 1;
    }

    //
    // Relations
    //
     public function role()
    {
        return $this->belongsTo('DavidWeber\Dominion\Models\Role');
    }

    //
    // Auth functions
    //
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

}