[![PHP PSR Enforcer](https://github.com/unax-org/logger/actions/workflows/phpcs.yml/badge.svg)](https://github.com/unax-org/logger/actions/workflows/phpcs.yml)
[![Logger Release](https://github.com/unax-org/logger/actions/workflows/release.yml/badge.svg)](https://github.com/unax-org/logger/actions/workflows/release.yml)

# Unax Logger

DefaultLogger class is available for logging. The DefaultLogger includes eight methods for writing logs to the eight RFC 5424 levels (debug, info, notice, warning, error, critical, alert, emergency).

## Example Usage

    require(__DIR__ . '/vendor/autoload.php');


    \Unax\Logger\LogHandlerFile::setLogHandlerFile(__DIR__ . '/debug.log');
    \Unax\Logger\Logger::setLogThreshold('info');

    $logger = \Unax\Logger\Logger::getLogger();
    $logger->info('Hello World!');

Default log destination is PHP error_log() destination. Default logging threshold is 'error'. Everything below treshold will be skipped.    

## Support
Unax Logger is supported by Unax. Comments are welcome on support@unax.org.
