<?php

namespace App\Services;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

class OpenWeatherMapService implements WeatherServiceInterface
{
    public function __construct($key)
    {
        $httpRequestFactory = new RequestFactory();
        $httpClient = GuzzleAdapter::createWithConfig([]);

        $this->owm = new OpenWeatherMap($key, $httpClient, $httpRequestFactory);
    }

    public function getData($location)
    {
        try {
            $f = $this->owm->getWeather("$location,JP");

            return [
              'temp' => $f->temperature->now,
              'temp_min' => $f->temperature->min,
              'temp_max' => $f->temperature->max,
              'sunrise' => $f->sun->rise,
              'sunset' => $f->sun->set,
              'weather_description' => $f->weather->description,
              'icon_url' => $f->weather->getIconUrl(),
              'icon' => $f->weather->icon,
          ];
        } catch (OWMException $e) {
            return 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
        } catch (\Exception $e) {
            return 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
        }
    }
}
