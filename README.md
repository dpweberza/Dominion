Dominion
========

An admin package for Laravel 4 that has no dependencies other than Laravel 4.


###Features
* Role and module based access control.
* Bootstrap templating.

### Core Modules
* Module Groups
* Modules
* Roles
* Users
* Log Viewer


###Installation
Add the package "david-weber/dominion": "1.*" to the require array in your composer.json

Config
    auth.php
        Change the model value to: 'DavidWeber\Dominion\Models\User'
    app.php
        Add the following string to the providers array: 'DavidWeber\Dominion\DominionServiceProvider',