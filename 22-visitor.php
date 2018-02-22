<?php

class Car
{
    public $color = "Silver";

    // accepting Enhancer as visitor
    public function visitor(Enhancer $enhancer)
    {
        $this->color = $enhancer->enhance( $this );
    }
}

// === A visitor ===
// That can visit into Car object change it
// The benefit is, Car object is now seperated from
// detail algorithm of how it can be enhanced
class Enhancer
{
    // visiting into Car
    public function enhance(Car $car)
    {
        return "Matelic $car->color";
    }
}

// ---

$car = new Car();
echo $car->color . "\n";
// Output: Silver

$car->visitor(new Enhancer());
echo $car->color . "\n";
// Output: Matelic Silver
