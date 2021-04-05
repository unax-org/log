<?php

namespace Unax\Logger;

/**
 * Class LogHandlerFile.
 */
class LogHandlerFile
{
    /**
     * The log handler file. Path to log file
     * @var string
     */
    public static $logHandlerFile = null;


    /**
     * Get the value of The log destination
     *
     * @return string
     */
    public static function getLogHandlerFile()
    {
        return self::$logHandlerFile;
    }

    /**
     * Set the value of The log destination
     *
     * @param string $logHandlerFile
     *
     * @return self
     */
    public static function setLogHandlerFile($logHandlerFile)
    {
        if (null === $logHandlerFile) {
            self::$logHandlerFile = null;
            return;
        }
        if (! touch($logHandlerFile)) {
            self::$logHandlerFile = null;
            return;
        }

        self::$logHandlerFile = $logHandlerFile;
    }
}
