<?php
require_once('QuackBehavior.php');
class Squeak implements QuackBehavior
{
    public function aquack()
    {
        echo 'Squeak' . PHP_EOL;
    }
}