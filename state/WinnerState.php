<?php
require_once('State.php');
class WinnerState implements State
{
    public $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter()
    {
        echo "Please wait, we're already giving you a gumball" . PHP_EOL;
    }

    public function ejectQuarter()
    {
        echo "Sorry, you already turned the crank" . PHP_EOL;
    }

    public function turnCrank()
    {
        echo "Turning twice doesn't get you another gumball!" . PHP_EOL;
    }

    public function dispense()
    {
        echo "You're A Winner! You get two gumballs for your quarter" . PHP_EOL;
        $this->gumballMachine->releaseBall();
        if ($this->gumballMachine->getCount() == 0) {
            $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
        } else {
            $this->gumballMachine->releaseBall();
            if ($this->gumballMachine->getCount() > 0) {
                $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
            } else {
                echo "Oops, out of gumballs!" . PHP_EOL;
                $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
            }
        }
    }
}
