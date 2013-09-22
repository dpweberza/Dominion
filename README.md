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
* Unit Tests
* Functional Tests
* Auditing / Action Log
* More Coming Soon...


###Getting Started
####Configuration    
1. Add the package to the require array in the file /composer.json:

    `"david-weber/dominion": "dev-master"`
2. Change the model value in the file /app/config/auth.php to the following:

    `'DavidWeber\Dominion\Models\User',`
3. Add the following string to the providers array in the file /app/config/app.php:

    `'DavidWeber\Dominion\DominionServiceProvider',`
4. Change the title, footer and logo in the file /app/config/packages/david-weber/dominion/config.php
    

####Installation
Run the following commands from your terminal / command prompt:

1. Publish Assets

    `php artisan asset:publish "david-weber/dominion"`
2. Run Migrations
    
    `php artisan migrate --package="david-weber/dominion"`
3. Run Seeders
    
    `php artisan db:seed --class="DavidWeber\Dominion\Seeders\DatabaseSeeder"`

####Admin Login
You can now browse to http://YourServer:ServerPort/AppRoot/admin

The default credentials are:

Email Address: admin@dominion.com

Password: password


###Extending The Admin Interface
####Modules
1. Create a controller which extends DominionController.
2. Create a Module Group entry via the admin GUI or with a seeder.
3. Create the Module entry via the admin GUI or with a seeder.
4. Assign the module to the user's role.


###Theming The Admin Interface
Coming Soon...