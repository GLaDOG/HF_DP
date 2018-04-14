<?php
require_once('Subject.php');
class WeatherData implements Subject
{
    protected $observers;
    protected $temperature;
    protected $humidity;
    protected $pressure;

    public function __construct()
    {
        $this->observers = array();
    }

    public function registerObserver(Observer $anObserver): void
    {
        array_push($this->observers, $anObserver);
    }

    public function removeObserver(Observer $anObserver): void
    {
        $key = array_search($anObserver, $this->observers, true);
        if (0 <= $key) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function measurementsChanged()
    {
        $this->notifyObservers();
    }

    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getPressure()
    {
        return $this->pressure;
    }
}