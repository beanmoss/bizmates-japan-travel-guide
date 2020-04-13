<?php
namespace App\Services;

interface WeatherServiceInterface
{
    public function getData($location);
}