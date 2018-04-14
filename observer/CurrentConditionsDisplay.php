<?php
require_once('Observer.php');
require_once('DisplayElement.php');
class CurrentConditionsDisplay implements Observer, DisplayElement
{
    protected $temperature;
    protected $humidity;
    protected $weatherData;

    public function __construct(WeatherData $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }

    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }

    public function display()
    {
        echo 'Current conditions: ' . $this->temperature
           . 'F degrees and '. $this->humidity . '% humidity' . PHP_EOL;
    }
}