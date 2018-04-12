<?php
require_once('FlyBehavior.php');
class FlyWithWings implements FlyBeHavior
{
    public function fly()
    {
        echo 'I\'m flying' . PHP_EOL;
    }
}