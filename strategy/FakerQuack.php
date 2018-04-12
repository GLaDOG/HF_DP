<?php
require_once('QuackBehavior.php');
class FakerQuack implements QuackBehavior
{
    public function aquack()
    {
        echo 'Qwak' . PHP_EOL;
    }
}