Dominion
========

A WIP admin package for Laravel 4 that has no dependencies other than Laravel 4.
I would not call this production ready just yet, I am still finishing up some of the core modules.

This is my first package and experience with Laravel, having switched from FuelPHP.
I started this project to avoid having to create a new admin interface for each project, as I was previously doing.
When I started this there weren't many admin packages for Laravel 4, and the few that there was were dependent on third-party packages or had jQuery UI or other components built into the frontend already.
While not re-inventing the wheel is great, I am new to Laravel and want to use as much of the core code as possible and avoid third-party packages.

All feedback is welcome and appreciated.

###Features
* Simple role and module based access control.
* Bootstrap 3 templating.
* Easy to extend admin interface.


### Core Modules
* Module Groups - manage module groups.
* Modules - manage modules.
* Roles - manage user roles and their modules.
* Users - manage users.
* Log Viewer - view the application logs.


###Road Map
Unit Tests
Functional Tests
Auditing / Action Log
More Coming Soon...


###Getting Started
####Configuration    
/composer.json
    Add the package "david-weber/dominion": "dev-master" to the require array

/app/config/auth.php
    Change the model value to: 'DavidWeber\Dominion\Models\User'

/app/config/app.php
    Add the following string to the providers array: 'DavidWeber\Dominion\DominionServiceProvider',

/app/config/packages/david-weber/dominion/config.php
     Change the title, footer and logo

####Installation
Run the following commands from your terminal / command prompt:

Assets
    php artisan asset:publish "david-weber/dominion"
Migrations
    php artisan migrate --package="david-weber/dominion"
Seeders
    php artisan db:seed --class="DavidWeber\Dominion\Seeders\DatabaseSeeder"