<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory {

    public function __invoke():Logger
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler());
        return $logger;
    }

}
