<?php

interface Car
{
    public function drive();
}

class Fit implements Car
{
    public function drive()
    {
        echo "Driving Fit...\n";
    }
}

class Vitz implements Car
{
    public function drive()
    {
        echo "Driving Vitz...\n";
    }
}

// === Null implementation ===
// A blank implementation similar to real one
class NullCar implements Car
{
    public function drive()
    {
        //
    }
}

$name = null;
switch($name) {
    case "Fit":
        $car = new Fit(); break;
    case "Vitz":
        $car = new Vitz(); break;
    default:
        $car = new NullCar();
}

// ---

$car->drive();
// Output: [nothing]

// We avoided `Call to a memeber function on null` error here.
// Without NullCar object the code will look like following
// to avoid such error.
//
// if( isset($car) and $car instanceof Car ) {
//     $car->drive();
// }
