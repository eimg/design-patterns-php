<?php

class CarOptions
{
    var $color = "White";
    var $doors = 4;
}

class Car
{
    private $color;
    private $doors;

    public function __construct(CarOptions $options)
    {
        $this->color = $options->color;
        $this->doors = $options->doors;
    }

    public function info()
    {
        return "This is a $this->doors doors $this->color car.\n";
    }
}

// === Abstract/Guideline to creat CarFactory ===
// This help use create interchangable factories
// See also: Factory Method pattern
abstract class CarFactory
{
    abstract public function build();
}

class RedCarFactory extends CarFactory
{
    private $options;

    public function __construct($doors)
    {
        $options = new CarOptions();
        $options->color = "Red";
        $options->doors = $doors;

        $this->options = $options;
    }

    public function build()
    {
        return new Car($this->options);
    }
}

class BlueCarFactory extends CarFactory
{
    private $options;

    public function __construct($doors)
    {
        $options = new CarOptions();
        $options->color = "Blue";
        $options->doors = $doors;

        $this->options = $options;
    }

    public function build()
    {
        return new Car($this->options);
    }
}

// ---

$color = "Blue";

// Deciding which factory to use
if($color == "Blue") {
    $factory = new BlueCarFactory(5);
} elseif($color == "Red") {
    $factory = new RedCarFactory(4);
}

$car = $factory->build();
echo $car->info();
// Output: This is a 5 doors Blue car.
