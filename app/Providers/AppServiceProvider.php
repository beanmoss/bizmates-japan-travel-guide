<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\WeatherServiceInterface;
use App\Services\VenueServiceInterface;
use App\Services\VenueService;
use App\Services\OpenWeatherMapService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(WeatherServiceInterface::class, function ($app) {
            return new OpenWeatherMapService(env('OWM_KEY'));
        });

        $this->app->singleton(VenueServiceInterface::class, function ($app) {
            return new VenueService(env('FOUR_SQUARE_CLIENT_ID'), env('FOUR_SQUARE_CLIENT_SECRET'));
        });
    }
}
