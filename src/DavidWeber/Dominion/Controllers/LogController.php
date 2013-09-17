<?php

namespace DavidWeber\Dominion\Controllers;

use \Illuminate\Routing\Controllers\Controller;
use \Carbon\Carbon;
use Psr\Log\LogLevel;

/**
 * Log controller
 *
 * @author David
 */
class LogController extends BaseController
{

    private static $SAPI_MAPPING = array(
        'apache' => 'Apache',
        'cgi-fcgi' => 'Fast CGI',
        'fpm-fcgi' => 'Nginx',
        'cli' => 'CLI',
    );
    private static $LOG_LEVEL_TO_CLASS_MAPPING = array(
        LogLevel::EMERGENCY => 'label-danger',
        LogLevel::ALERT => 'label-danger',
        LogLevel::CRITICAL => 'label-danger',
        LogLevel::ERROR => 'label-danger',
        LogLevel::WARNING => 'label-warning',
        LogLevel::NOTICE => 'label-warning',
        LogLevel::INFO => 'label-info',
        LogLevel::DEBUG => 'label-primary'
    );

    public function getIndex()
    {
        $logs = array();
        foreach (self::$SAPI_MAPPING as $sapi => $human) {
            $logs[$sapi]['sapi'] = $human;

            $files = array();
            $files = glob(storage_path() . '/logs' . '/log-' . $sapi . '*', GLOB_BRACE);
            if (is_array($files)) {
                $files = array_reverse($files);
                foreach ($files as &$file) {
                    $file = preg_replace('/.*(\d{4}-\d{2}-\d{2}).*/', '$1', basename($file));
                }
            } else
                $files = array();
            $logs[$sapi]['logs'] = $files;
        }

        return \View::make('dominion::pages.log.index', array('logs' => $logs));
    }

    public function getView()
    {
        $entries = array();
        $pattern = "/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\].*/";
        $date = \Input::get('date');
        $sapi = \Input::get('sapi');

        $logLevels = $this->getLogLevels();
        $logFile = glob(storage_path() . '/logs' . '/log-' . $sapi . '*-' . $date . '.txt');

        if (!empty($logFile)) {
            $file = \File::get($logFile[0]);

            preg_match_all($pattern, $file, $headings);
            $logData = preg_split($pattern, $file);

            if ($logData[0] < 1) {
                $trash = array_shift($logData);
                unset($trash);
            }

            foreach ($headings as $heading) {
                for ($i = 0, $j = count($heading); $i < $j; $i++) {
                    foreach ($logLevels as $logLevel) {
                        if (strpos(strtolower($heading[$i]), strtolower('log.' . $logLevel))) {
                            $entries[] = array('level' => $logLevel, 'class' => self::$LOG_LEVEL_TO_CLASS_MAPPING[$logLevel], 'header' => $heading[$i], 'stack' => $logData[$i]);
                        }
                    }
                }
            }
        }

        // Sort the logs in descending order
        $entries = array_reverse($entries);

        return \View::make('dominion::pages.log.view', array('entries' => $entries, 'sapi' => $sapi, 'date' => $date));
    }

    /**
     * Get the log levels from psr/log
     * @return type
     */
    private function getLogLevels()
    {
        $class = new \ReflectionClass(new LogLevel);
        return $constants = $class->getConstants();
    }

}