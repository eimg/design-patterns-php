<?php

interface Car
{
    public function pick();
}

class Fit implements Car
{
    public function pick()
    {
        echo "Picking Fit for today.\n";
    }
}

class Vitz implements Car
{
    public function pick()
    {
        echo "Picking Vitz for today.\n";
    }
}

// === CarPickerStrategy ===
// That decide which car object to use based on the situation
// The benefit is that we can add more strategies later,
// clients doesn't have to know or change their implementation
class CarPickerStrategy
{
    public $today;

    public function __construct($today)
    {
        $this->today = $today;
    }

    public function pick()
    {
        if( $this->today == "Monday" ) {
            $car = new Vitz();
        } else {
            $car = new Fit();
        }

        $car->pick();
    }
}

// ---

$carpicker = new CarPickerStrategy("Sunday");
$carpicker->pick();
// Output: Picking Fit for today.

$carpicker->today = "Monday";
$carpicker->pick();
// Output: Picking Vitz for today.
