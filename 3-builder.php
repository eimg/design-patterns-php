<?php

// === CarBuilder that create Car object for us ===
// But instead of providing all properties on creation
// we can set them one-by-one through setter methods
class CarBuilder
{
    private $color;
    private $doors;

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function setDoors($doors)
    {
        $this->doors = $doors;
        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getDoors()
    {
        return $this->doors;
    }

    function build()
    {
        return new Car($this);
    }
}

class Car
{
    public $color;
    public $doors;

    public function __construct(CarBuilder $cb)
    {
        $this->color = $cb->getColor();
        $this->doors = $cb->getDoors();
    }

    static function builder()
    {
        return new CarBuilder();
    }
}

// ---

$car = Car::builder()->setColor("Silver")->setDoors(5)->build();

print_r($car);
// Output: Car Object([color] => Silver, [doors] => 5)
