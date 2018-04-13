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
        if (!$this->randomWinner()) {
            $this->gumballMachine->setState($this->gumballMachine->getSoldState());
        } else {
            $this->gumballMachine->setState($this->gumballMachine->getWinnerState());
        }
    }

    public function dispense()
    {
        echo "No gumball dispenseed" . PHP_EOL;
    }

    public function randomWinner()
    {
        $randkey = mt_rand(0, 99);
        if ($randkey < 10) {
            return true;
        }
        return false;
    }

    public function __toString()
    {
        return "waiting for turn of crank" . PHP_EOL;
    }
}
