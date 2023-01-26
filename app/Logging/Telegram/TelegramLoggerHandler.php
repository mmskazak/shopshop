<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerHandler extends AbstractProcessingHandler {

    protected int $chatId;

    protected string $token;

    public function __construct(array $config) {
        $level = Logger::toMonologLevel($config['level']);

        parent::__constract($level);

        $this->token = $config['token'];

        $this->chatId = $config['chatId'];
    }

    protected function write(array $record): void {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $record['formatted']);
    }

}
