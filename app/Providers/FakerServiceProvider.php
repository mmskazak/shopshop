<?php

namespace App\Providers;

use App\Providers\FakerExtension\ImageLocalFakerProvider;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Generator::class, function ($app) {

            $faker = Factory::create();
            $faker->addProvider(new ImageLocalFakerProvider($faker));

            return $faker;
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
