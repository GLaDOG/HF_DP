<?php
require_once('HasQuarterState.php');
require_once('NoQuarterState.php');
require_once('SoldOutState.php');
require_once('SoldState.php');
class GumballMachine
{
    protected $soldOutState;
    protected $noQuarterState;
    protected $hasQuarterState;
    protected $soldState;

    protected $state;
    protected $count = 0;

    public function __construct($numberGumballs)
    {
        $this->state = $this->soldOutState;//能初始化成功吗?
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldState = new SoldState($this);

        $this->count = $numberGumballs;
        if ($numberGumballs > 0) {
            $this->state = $this->noQuarterState;
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

    public function setState(State $state)
    {
        $this->state = $this->state;
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

    public function __toString()
    {
        $result = "\nMighty Gumball, Inc.";
        $result .= "\nPHP-enabled Standing Gumball Model #2004";
        $result .= "\nInvertory: $this->count gumball";
        if ($this->count != 1)
        {
            $result .= "s";
        }
        $result .= "\n";
        $result .= "Machine is $this->state \n";
        return $result;
    }
}
