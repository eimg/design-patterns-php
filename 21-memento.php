<?php

// === A Memento ===
// That store backup copy of a Car object
class Memento
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getCar()
    {
        return $this->car;
    }
}

class Car
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
}

class Customizer
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    // Store backup copy in Memento
    public function copy()
    {
        return new Memento( clone $this->car );
    }

    // Retrive backup from Memento
    public function restore(Memento $memento)
    {
        $this->car = $memento->getCar();
    }

    public function changeColor($color)
    {
        $this->car->color = $color;
    }

    public function getColor()
    {
        return $this->car->color;
    }
}

// ---

$custom = new Customizer( new Car("White") );
echo $custom->getColor() . "\n";
// Output: White

$backup = $custom->copy();

$custom->changeColor("Black");
echo $custom->getColor() . "\n";
// Output: Black

$custom->restore($backup);
echo $custom->getColor() . "\n";
// Output: White
