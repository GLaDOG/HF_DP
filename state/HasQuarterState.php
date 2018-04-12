<?php
require_once('State.php');
class HasQuarterState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "You can't insert another quarter" . PHP_EOL;
    }

    public function ejectQuarter()
    {
        echo "Quarter returned" . PHP_EOL;
        $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
    }

    public function turnCrank()
    {
        echo "You turned..." . PHP_EOL;
        $this->gumballMachine->setState($this->gumballMachine->getSoldState());
    }

    public function dispense()
    {
        echo "No gumball dispenseed" . PHP_EOL;
    }

    public function __toString()
    {
        return "waiting for turn of crank" . PHP_EOL;
    }
}
