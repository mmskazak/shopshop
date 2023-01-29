<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory {

    public function __invoke(string $level, string $token, string $chatId):Logger
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($level, $token, $chatId));
        return $logger;
    }

}
