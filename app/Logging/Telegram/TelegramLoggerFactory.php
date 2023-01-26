<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory {

    public function __invoke(array $config):Logger
    {
        $logger = new Logger($config);
        $logger->pushHandler(new TelegramLoggerHandler($config));
        return $logger;
    }

}
