<?php

namespace DavidWeber\Dominion\Util\Notification;

/**
 * A notification message struct
 *
 * @author David Weber
 */
class Message {

    public $type;
    public $title;
    public $text;

    /**
     * Constructor
     * @param const $type
     * @param String $title
     * @param String $text
     */
    public function __construct($type, $title, $text) {
        $this->type = $type;
        $this->title = $title;
        $this->text = $text;
    }

}

?>