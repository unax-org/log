<?php

namespace Unax\Logger;

/**
 * Class Logger.
 */
class Logger
{
    /**
     * The logger used to produce messages
     * @var null|\Unax\Logger\LoggerInterface
     */
    public static $logger = null;

    /**
     * The log threshold, options: emergency|alert|critical|error|warning|notice|info|debug.
     * @var string
     */
    public static $logThreshold = 'error';


    /**
     * Get the value of The logger used to produce messages
     *
     * @return \Unax\Logger\LoggerInterface
     */
    public static function getLogger()
    {
        if (null === self::$logger) {
            return new \Unax\Logger\DefaultLogger(self::getLogThreshold());
        }

        return self::$logger;
    }


    /**
     * Set the value of The logger used to produce messages
     *
     * @param \Unax\Logger\LoggerInterface $logger
     *
     * @return self
     */
    public static function setLogger($logger)
    {
        self::$logger = $logger;
    }


    /**
     * Get the value of log threshold
     *
     * @return string
     */
    public static function getLogThreshold()
    {
        return self::$logThreshold;
    }


    /**
     * Set the value of log threshold
     *
     * @param string options: emergency|alert|critical|error|warning|notice|info|debug.
     *
     * @return self
     */
    public static function setLogThreshold($logThreshold)
    {
        self::$logThreshold = $logThreshold;
    }
}
