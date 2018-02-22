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

// === CarFactory that create Car object for us ===
// We can create Car object directly using Car class
// But, by using this factory, we can skip the detail
class CarFactory
{
    private $options;

    public function __construct($color, $doors)
    {
        $options = new CarOptions();
        $options->color = $color;
        $options->doors = $doors;

        $this->options = $options;
    }

    public function build()
    {
        return new Car($this->options);
    }
}

// ---

$factory = new CarFactory("Red", 2);
$car = $factory->build();

echo $car->info();
// Output: This is a 2 doors Red car.
