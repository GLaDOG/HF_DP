<?php
require_once('Observer.php');
require_once('DisplayElement.php');
class StatisticsDisplay implements Observer, DisplayElement
{
    protected $maxTemp;
    protected $minTemp;
    protected $tempSum;
    protected $numReadings;
    protected $weatherData;

    public function __construct(WeatherData $weatherData)
    {
        $this->maxTemp = 0.0;
        $this->minTemp = 200;
        $this->tempSum = 0.0;
        $this->numReadings = 0;
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }

    public function update($temperature, $humidity, $pressure)
    {
        $this->tempSum += $temperature;
        $this->numReadings++;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }

        $this->display();
    }

    public function display()
    {
        echo 'Avg/Max/Min Temperature = '
             . $this->tempSum/$this->numReadings . '/'
             . $this->maxTemp . '/'
             . $this->minTemp . PHP_EOL;
    }
}