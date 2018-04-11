<?php
class SoldOutState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "You can't insert a quarter, the machine is sold out";
    }

    public function ejectQuarter()
    {
        echo "You can't eject, you haven't inserted a quarter yet";
    }

    public function turnCrank()
    {
        echo "You turned, but there are no gumballs";
    }

    public function dispense()
    {
        echo "No gumball dispense";
    }

    public function __toString()
    {
        return "sold out";
    }
}
