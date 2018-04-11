<?php
class SoldState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "Please wait, we're already giving you a gumball";
    }

    public function ejectQuarter()
    {
        echo "Sorry, you already turned the crank";
    }

    public function turnCrank()
    {
        echo "Turning twice doesn't get you another gumball!");
    }

    public function dispense()
    {
        $this->gumballMachine->releaseBall();
        if ($this->gumballMachine->getCount() > 0)
        {
            $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
        } else {
            echo "Oops, out of gumballs!";
            $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
        }
    }

    public function __toString()
    {
        return "dispenseing a gumball";
    }
}
