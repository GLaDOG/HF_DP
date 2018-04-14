<?php
require_once('Observer.php');
require_once('DisplayElement.php');
class ForecastDisplay implements Observer, DisplayElement
{
    protected $currentPressure;
    protected $lastPressure;
    protected $weatherData;

    public function __construct(WeatherData $weatherData)
    {
        $this->currentPressure = 29.92;
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }

    public function update($temperature, $humidity, $pressure)
    {
        $this->lastPressure = $this->currentPressure;
        $this->currentPressure = $pressure;
        $this->display();
    }

    public function display()
    {
        echo 'Forecast: ' . PHP_EOL;
        if ($this->currentPressure > $this->lastPressure) {
            echo 'Improving weather on the way!' . PHP_EOL;
        } elseif ($this->currentPressure == $this->lastPressure) {
            echo 'More of the same' . PHP_EOL;
        } elseif ($this->currentPressure < $this->lastPressure) {
            echo 'Watch out for cooler, rainy weather' . PHP_EOL;
        }
    }
}