<?php

interface CarInterface
{
    public function setup();
}

class Car implements CarInterface
{
    public $features;

    public function setup()
    {
        $this->features = "Alloy Wheel";
    }
}

abstract class CarDecorator implements CarInterface
{
    protected $car;

    public function __construct(CarInterface $car)
    {
        $this->car = $car;
    }

    abstract public function setup();
}

// === A CarDecorator that can add ===
// additional feature to existing Car object
class SunroofDecorator extends CarDecorator
{
    public function setup()
    {
        $this->car->setup();
        $this->car->features .= ", Sunroof";
        $this->features = $this->car->features;
    }
}

// === A CarDecorator that can add ===
// additional feature to existing Car object
class SpoilerDecorator extends CarDecorator
{
    public function setup()
    {
        $this->car->setup();
        $this->car->features .= ", Spoiler";
        $this->features = $this->car->features;
    }
}

// ---

$car = new Car();
$car = new SunroofDecorator($car);
$car = new SpoilerDecorator($car);
$car->setup();

echo $car->features;
// Output: Alloy Wheel, Sunroof, Spoiler
