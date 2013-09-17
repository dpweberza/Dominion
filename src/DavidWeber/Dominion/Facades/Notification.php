<?php

namespace DavidWeber\Dominion\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Notification facade
 *
 * @author David
 */
class Notification extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'notification';
    }

}

?>