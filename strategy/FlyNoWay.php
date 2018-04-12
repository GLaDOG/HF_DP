<?php
require_once('FlyBehavior.php');
class FlyNoWay implements FlyBehavior
{
    public function fly()
    {
        echo 'I\'m can\'t fly' . PHP_EOL;
    }
}