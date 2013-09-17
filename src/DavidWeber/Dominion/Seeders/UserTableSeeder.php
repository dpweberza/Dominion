<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;
use \DavidWeber\Dominion\Models\User;

/**
 * Users seeder.
 *
 * @author David Weber
 */
class UserTableSeeder extends Seeder
{

    public function run()
    {
        \DB::table('users')->delete();

        User::create(array(
            'email' => 'dpweberza@gmail.com',
            'password' => \Hash::make('password'),
            'status_id' => 1,
            'role_id' => 1
        ));
    }

}