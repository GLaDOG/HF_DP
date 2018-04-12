<?php
require_once('QuackBehavior.php');
class Quack implements QuackBehavior
{
    public function aquack()
    {
        echo 'Quack' . PHP_EOL;
    }
}