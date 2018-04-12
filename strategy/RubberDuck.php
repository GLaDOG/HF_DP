<?php
require_once('Duck.php');
require_once('FlyNoWay.php');
require_once('Squeak.php');
class RubberDuck extends Duck
{
    public function __construct()
    {
        $this->flyBehavior = new FlyNoWay();
        $this->quackBehavior = new Squeak();
    }

    public function display()
    {
        echo 'I\'m a rubber duckie' . PHP_EOL;
    }
}