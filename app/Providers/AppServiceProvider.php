<?php

namespace App\Providers;

use App\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $kernel = app(Kernel::class);

        $kernel->whenRequestLifestyleIsLongerThan(
            CarbonInterval::seconds(4),
            function () {
                logger()->chanel('telegram')->debug('whenRequestLifestyleIsLongerThan', request()->url());
            }
        );
    }
}
