<?php
class NoQuarterState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "You inserted a quarter";
        $this->gumballMachine->setState($this->gumballMachine->getHasQuarterState());
    }

    public function ejectQuarter()
    {
        echo "You haven't inserted a quarter";
    }

    public function turnCrank()
    {
        echo "You turned, but there's no quarter";
    }

    public function dispense()
    {
        echo "You need to pay first";
    }

    public function __toString()
    {
        return "waiting for quarter";
    }
}
