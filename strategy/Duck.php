<?php
require_once('FlyBehavior.php');
require_once('QuackBehavior.php');
abstract class Duck
{
    protected $flyBehavior;
    protected $quackBehavior;

    public function __construct()
    {

    }

    public function setFlyBehavior(FlyBehavior $fb)
    {
        $this->flyBehavior = $fb;
    }

    public function setQuackBehavior(QuackBehavior $qb)
    {
        $this->quackBehavior = $qb;
    }

    abstract public function display();

    public function performQuack()
    {
        $this->quackBehavior->aquack();
    }

    public function performFly()
    {
        $this->flyBehavior->fly();
    }

    public function swim()
    {
        echo 'All ducks float, even decoys!' . PHP_EOL;
    }
}