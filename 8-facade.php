<?php

class CheckOilPressure
{
    public function check()
    {
        echo "Oil Pressure OK.\n";
    }
}

class CheckFuel
{
    public function check()
    {
        echo "Fuel Status OK.\n";
    }
}

class CheckBreakFluid
{
    public function check()
    {
        echo "Break Fluid OK.\n";
    }
}

// === Car Facede ===
// That provide simple interface (wrapper) to complex steps
// To start a car engine, the all we need is start() method
class Car
{
    public $oil;
    public $fuel;
    public $break;

    public function __construct()
    {
        $this->oil = new CheckOilPressure();
        $this->fuel = new CheckFuel();
        $this->break = new CheckBreakFluid();
    }

    public function start()
    {
        $this->oil->check();
        $this->fuel->check();
        $this->break->check();

        echo "Car Engine Started.\n";
    }
}

// ---

$car = new Car();
$car->start();

// Output:
// Oil Pressure OK.
// Fuel Status OK.
// Break Fluid OK.
// Car Engine Started.
