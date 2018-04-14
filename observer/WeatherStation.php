<?php
require_once('WeatherData.php');
require_once('CurrentConditionsDisplay.php');
require_once('StatisticsDisplay.php');
require_once('ForecastDisplay.php');
class WeatherStation
{
    public static function run()
    {
        $weatherData = new WeatherData();
        $currentDisplay = new CurrentConditionsDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);
        $forecastDisplay = new ForecastDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);
    }
}

WeatherStation::run();