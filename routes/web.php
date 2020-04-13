<?php

use App\Services\WeatherServiceInterface;
use App\Services\VenueServiceInterface;
use Illuminate\Support\Facades\Cache;

/* @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

define('CACHE_IN_SECONDS', 10800); //3hrs

$router->get('/', function () {
    return view('app', ['name' => 'Robel']);
});

$router->get('/api/venue/{location}', function ($location, VenueServiceInterface $venueService) use ($router) {
    return Cache::remember("venue-$location", CACHE_IN_SECONDS, function () use ($venueService, $location) {
        return $venueService->getData("$location,JP");
    });
});

$router->get('/api/weather/{location}', function ($location, WeatherServiceInterface $weatherService) use ($router) {
    return Cache::remember("weather-$location", CACHE_IN_SECONDS, function () use ($weatherService, $location) {
        return $weatherService->getData("$location,JP");
    });
});
