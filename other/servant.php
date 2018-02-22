<?php

// === A Servant ===
class Parking
{
    private $width = 2;

    public function check(Car $car)
    {
        if($this->width > $car->getWidth()) {
            echo "Parking OK\n";
        } else {
            echo "Parking not OK\n";
        }
    }
}

// Every Class that want to use Parking servent
// must implement this interface
interface Car
{
    public function check(Parking $parking);
    public function getWidth();
}

class Van implements Car
{
    private $width = 1.8;

    public function check(Parking $parking)
    {
        $parking->check($this);
    }

    public function getWidth() {
        return $this->width;
    }
}

class Bus implements Car
{
    private $width = 2.2;

    public function check(Parking $parking)
    {
        $parking->check($this);
    }

    public function getWidth() {
        return $this->width;
    }
}

// ---

(new Van())->check(new Parking());
// Output: Parking OK

(new Bus())->check(new Parking());
// Output: Parking not OK
