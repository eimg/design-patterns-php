<?php

// === Component ===
interface Honk
{
    public function honk();
}

// === Leaf ===
class Car implements Honk
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function honk()
    {
        echo "$this->name : Honk, honk...\n";
    }
}

// === Composit ===
// Both Leaf and Composit come from same Component
// So, both act the same way.
class CarList implements Honk
{
    public $list = [];

    public function add(Car $car)
    {
        $this->list[] = $car;
    }

    public function honk()
    {
        foreach($this->list as $car) {
            $car->honk();
        }
    }
}

// ---

$fit = new Car("Fit");
$vitz = new Car("Vitz");

$list = new CarList();
$list->add($fit);
$list->add($vitz);

$list->honk();
// Output:
// Fit : Honk, honk...
// Vitz : Honk, honk...
