<?php

namespace DavidWeber\Dominion\Seeders;

use \Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        $this->call('DavidWeber\Dominion\Seeders\ModuleGroupTableSeeder');
        $this->call('DavidWeber\Dominion\Seeders\ModuleTableSeeder');
        $this->call('DavidWeber\Dominion\Seeders\RoleTableSeeder');
        $this->call('DavidWeber\Dominion\Seeders\UserTableSeeder');
    }

}