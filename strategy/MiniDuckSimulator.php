<?php
require_once('MallardDuck.php');
require_once('RubberDuck.php');
require_once('DecoyDuck.php');
require_once('ModelDuck.php');
require_once('FlyRocketPowered.php');
class MiniDuckSimulator
{
    public function __construct()
    {

    }

    public static function run()
    {
        $mallard = new MallardDuck();
        $rubberDuckie = new RubberDuck();
        $decoy = new DecoyDuck();

        $model = new ModelDuck();

        $mallard->performQuack();
        $rubberDuckie->performQuack();
        $decoy->performQuack();

        $model->performFly();
        $model->setFlyBehavior(new FlyRocketPowered());
        $model->performFly();
    }
}

MiniDuckSimulator::run();