<?php

// === CarStatus ===
// Can set next object in line with setNext()
// Can run next object if exists with runNext()
abstract class CarStatus
{
    protected $next;

    public function setNext(CarStatus $next)
    {
        $this->next = $next;
    }

    public function runNext(Car $car)
    {
        if($this->next) {
            $this->next->check($car);
        }
    }

    abstract public function check(Car $car);
}

// A class that inhirit CarStatus and call runNext()
// to invoke similar function on next object in line
class OilPressure extends CarStatus
{
    public function check(Car $car)
    {
        if( $car->oil != "OK" ) {
            echo "Oil Pressure is not OK.\n";
        } else {
            echo "Oil Pressure is OK.\n";
        }

        $this->runNext($car);
    }
}

// A class that inhirit CarStatus and call runNext()
// to invoke similar function on next object in line
class FuelLevel extends CarStatus
{
    public function check(Car $car)
    {
        if( $car->fuel != "OK" ) {
            echo "Fuel Level is not OK.\n";
        } else {
            echo "Fuel Level is OK.\n";
        }

        $this->runNext($car);
    }
}

// A class that inhirit CarStatus and call runNext()
// to invoke similar function on next object in line
class BreakFluid extends CarStatus
{
    public function check(Car $car)
    {
        if( $car->break != "OK" ) {
            echo "Break Fluid is not OK.\n";
        } else {
            echo "Break Fluid is OK.\n";
        }

        $this->runNext($car);
    }
}

class Car
{
    public $oil = "OK";
    public $fuel;
    public $break = "OK";
}

// ---

$oil = new OilPressure();
$fuel = new FuelLevel();
$break = new BreakFluid();

// Setting next objects in line
$oil->setNext($fuel);
$fuel->setNext($break);

$oil->check(new Car());
// Output:
// Oil Pressure is OK.
// Fuel Level is not OK.
// Break Fluid is OK.
