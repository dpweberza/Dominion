<?php

namespace DavidWeber\Dominion\Util\Notification;

/**
 * Maintains a list of flash session based messages
 *
 * @author David Weber
 */
class Notification
{

    private $messages = array('success' => array(), 'error' => array());

    public function success($text, $title = 'Success!')
    {
        $this->messages['success'] = new Message('success', $title, $text);
        $this->updateFlash();
    }

    public function error($messages, $title = 'Error!')
    {
        if (is_array($messages)) {
            $text = '<ul>';
            foreach ($messages as $message) {
                $text .= '<li>' . $message . '</li>';
            }
            $text .= '</ul>';
        } else
            $text = $messages;

        $this->messages['error'] = new Message('danger', $title, $text);
        $this->updateFlash();
    }

    private function updateFlash()
    {
        \Session::flash('notifications', $this->messages);
    }

    public function getNotifications()
    {
        return array_flatten(\Session::get('notifications', $this->messages));
    }

}