<?php
require_once('State.php');
class NoQuarterState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "You inserted a quarter" . PHP_EOL;
        $this->gumballMachine->setState($this->gumballMachine->getHasQuarterState());
    }

    public function ejectQuarter()
    {
        echo "You haven't inserted a quarter" . PHP_EOL;
    }

    public function turnCrank()
    {
        echo "You turned, but there's no quarter" . PHP_EOL;
    }

    public function dispense()
    {
        echo "You need to pay first" . PHP_EOL;
    }

    public function __toString()
    {
        return "waiting for quarter" . PHP_EOL;
    }
}
