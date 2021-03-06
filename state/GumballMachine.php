<?php
require_once('HasQuarterState.php');
require_once('NoQuarterState.php');
require_once('SoldOutState.php');
require_once('SoldState.php');
require_once('WinnerState.php');
class GumballMachine
{
    protected $soldOutState;
    protected $noQuarterState;
    protected $hasQuarterState;
    protected $soldState;
    protected $winnerState;

    protected $state;
    protected $count = 0;

    public function __construct($numberGumballs)
    {
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldState = new SoldState($this);
        $this->winnerState = new WinnerState($this);
        $this->count = $numberGumballs;

        if ($numberGumballs > 0) {
            $this->state = $this->noQuarterState;
        } else {
            $this->state = $this->soldOutState;
        }
    }

    public function insertQuarter()
    {
        $this->state->insertQuarter();
    }

    public function ejectQuarter()
    {
        $this->state->ejectQuarter();
    }

    public function turnCrank()
    {
        $this->state->turnCrank();
        $this->state->dispense();
    }

    /**
     * 竟然写成这个样子:$this->state = $this->state;实在是无可救药了
     */
    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function releaseBall()
    {
        echo "A gumball comes rolling out the slot..." . PHP_EOL;
        if ($this->count != 0) {
            $this->count--;
        }
    }

    public function getCount()
    {
        return $this->count;
    }

    public function refill($count)
    {
        $this->count = $count;
        $this->state = $this->noQuarterState;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getSoldOutState()
    {
        return $this->soldOutState;
    }

    public function getNoQuarterState()
    {
        return $this->noQuarterState;
    }

    public function getHasQuarterState()
    {
        return $this->hasQuarterState;
    }

    public function getSoldState()
    {
        return $this->soldState;
    }

    public function getWinnerState()
    {
        return $this->winnerState;
    }

    public function __toString()
    {
        $result = PHP_EOL . "Mighty Gumball, Inc.";
        $result .= PHP_EOL . "PHP-enabled Standing Gumball Model #2004";
        $result .= PHP_EOL . "Invertory: $this->count gumball";
        if ($this->count != 1)
        {
            $result .= "s";
        }
        $result .= "\n";
        $result .= "Machine is $this->state" . PHP_EOL;
        return $result;
    }
}
