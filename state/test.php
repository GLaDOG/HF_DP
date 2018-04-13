<?php
require_once('GumballMachine.php');
class Test
{
    public static function run()
    {
        $gumballMachine = new GumballMachine(5);
            
        echo $gumballMachine;
            
        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
            
        echo $gumballMachine;
            
        $gumballMachine->insertQuarter();
        $gumballMachine->ejectQuarter();
        $gumballMachine->turnCrank();

        echo $gumballMachine;

        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $gumballMachine->ejectQuarter();
            
        echo $gumballMachine;

        $gumballMachine->insertQuarter();
        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();

        echo $gumballMachine;

        $gumballMachine->refill(1000);

        for ($i = 0; $i < 100; $i++) {
            $gumballMachine->insertQuarter();
            $gumballMachine->turnCrank();
        }
        
        echo $gumballMachine;
    }
}

Test::run();