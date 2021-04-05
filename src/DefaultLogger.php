<?php

namespace Unax\Logger;

/**
 * Class DefaultLogger.
 */
class DefaultLogger implements LoggerInterface
{
    /**
     * Minimum log level this handler will process.
     *
     * @var int Integer representation of minimum log level to handle.
     */
    protected $threshold;


    /**
     * Constructor for the logger.
     *
     * @param string $threshold Optional. Define an explicit threshold. By default, all logs will be processed.
     */
    public function __construct($threshold = null)
    {
        if (null !== $threshold && ! \Unax\Logger\LogLevels::isValidLevel($threshold)) {
            $threshold = null;
        }

        if (null !== $threshold) {
            $threshold = \Unax\Logger\LogLevels::getLevelSeverity($threshold);
        } else {
            $threshold = 0;
        }

        $this->threshold = $threshold;
    }

    /**
     * Add a log entry.
     *
     * @param string $level One of the following:
     *     'emergency': System is unusable.
     *     'alert': Action must be taken immediately.
     *     'critical': Critical conditions.
     *     'error': Error conditions.
     *     'warning': Warning conditions.
     *     'notice': Normal but significant condition.
     *     'info': Informational messages.
     *     'debug': Debug-level messages.
     * @param string $message Log message.
     * @param array  $context Optional. Additional information for log handlers.
     * @return bool
     */
    public function log($level, $message, $context = array())
    {
        if (!\Unax\Logger\LogLevels::isValidLevel($level)) {
            throw new \Unax\Exception\InvalidArgumentException();
        }

        if ($this->threshold > \Unax\Logger\LogLevels::getLevelSeverity($level)) {
            return;
        }

        $handler = new \Unax\Logger\DefaultLogHandler();

        return $handler->handle(time(), $level, $message, $context);
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function emergency($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function alert($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function critical($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function error($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function warning($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function notice($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function info($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function debug($message, array $context = array())
    {
        return $this->log(\Unax\Logger\LogLevels::DEBUG, $message, $context);
    }
}
