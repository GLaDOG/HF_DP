<?php
require_once('State.php'); 
 class SoldOutState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "You can't insert a quarter, the machine is sold out" . PHP_EOL;
    }

    public function ejectQuarter()
    {
        echo "You can't eject, you haven't inserted a quarter yet" . PHP_EOL;
    }

    public function turnCrank()
    {
        echo "You turned, but there are no gumballs" . PHP_EOL;
    }

    public function dispense()
    {
        echo "No gumball dispense" . PHP_EOL;
    }

    public function __toString()
    {
        return "sold out" . PHP_EOL;
    }
}
