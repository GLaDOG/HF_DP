<?php
require_once('QuackBehavior.php');
class MuteQuack implements QuackBehavior
{
    public function aquack()
    {
        echo '<< Slience >>' . PHP_EOL;
    }
}