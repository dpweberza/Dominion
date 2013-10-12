<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;
use \DavidWeber\Dominion\Models\User;

/**
 * Users seeder.
 *
 * @author David Weber
 */
class UserTableSeeder extends Seeder {

    public function run() {
        \DB::table('users')->delete();

        User::create(array(
            'username' => 'admin',
            'password' => 'password',
            'email_address' => 'admin@dominion.com',
            'status_id' => 1,
            'role_id' => 1
        ));
    }

}
