<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramLoggerHandler extends AbstractProcessingHandler {

    protected int $chatId;

    protected string $token;

    public function __construct() {
        $level = Logger::toMonologLevel('debug');

        parent::__construct($level);

        $this->token = config('logging.channels.telegram.token');
        $this->chatId = config('logging.channels.telegram.chat_id');
    }

    protected function write(array $record): void {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $record['formatted']);
    }

}
