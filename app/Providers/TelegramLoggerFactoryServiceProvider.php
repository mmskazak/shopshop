<?php

namespace App\Providers;

use App\Logging\Telegram\TelegramLoggerFactory;
use Illuminate\Support\ServiceProvider;

class TelegramLoggerFactoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TelegramLoggerFactory::class, function ($app) {
            return new TelegramLoggerFactory(
                config('logging.channels.telegram.level'),
                config('logging.channels.telegram.token'),
                config('logging.channels.telegram.chat_id')
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
