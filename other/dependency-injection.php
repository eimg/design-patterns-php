<?php

// === Dependency ===
class CarOptions
{
    public $color = "White";
    public $doors = 4;
}

// === Constructor Injection ===
// The required object (dependency) is not created inside the class.
// Instead, it is passed on at through constructor on creation.
// So that, we can swap dependency without having to change the class.
class Car
{
    private $options;

    public function __construct(CarOptions $options)
    {
        $this->options = $options;
    }

    public function getColor()
    {
        return $this->options->color;
    }
}

$car = new Car( new CarOptions() );
echo $car->getColor() . "\n";
// Output: White

// === Interface & Setter Injection ===
interface CarInterface
{
    public function setOptions(CarOptions $options);
}

class Car2 implements CarInterface
{
    private $options;

    public function setOptions(CarOptions $options)
    {
        $this->options = $options;
    }

    public function getColor()
    {
        return $this->options->color ?? null;
    }
}

$car2 = new Car2();
$car2->setOptions( new CarOptions() );
echo $car2->getColor() . "\n";
// Output: White
