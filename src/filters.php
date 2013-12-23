<?php

Route::filter('admin', function() {
    if (Auth::guest())
        return Redirect::to('admin\login');

    // Check that the user account is active
    $user = Auth::user();
    if (!$user->isActive()) {
        \Notification::error('Your user account is suspended.');
        return Redirect::to('admin');
    }

    // Determine the requested module
    $requestedModule = null;
    foreach (DavidWeber\Dominion\Models\Module::all() as $module) {
        if (starts_with(Route::current()->getActionName(), $module->controller)) {
            $requestedModule = $module;
        }
    }

    // Check module access rights
    if ($requestedModule != null) {
        $hasModuleAccess = false;
        $roleModules = $user->role->modules;
        foreach ($roleModules as $module) {
            if ($module->id == $requestedModule->id)
                $hasModuleAccess = true;
        }

        if (!$hasModuleAccess) {
            \Notification::error('You do not have access to the module: ' . $requestedModule->name . '.');
            return Redirect::to('admin');
        }
    }
});
