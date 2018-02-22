<?php

// === Available states ===
interface StateInterface
{
    public function drive();
    public function stop();
}

// === All state changes are denied by default ===
abstract class CarStates implements StateInterface
{
    public function drive()
    {
        echo "You are not allow to drive.\n"; exit();
    }

    public function stop()
    {
        echo "You are not allow to stop.\n"; exit();
    }
}

// === DriveState is allow to stop ===
// But not allow to drive (by default)
class DriveState extends CarStates
{
    public function stop()
    {
        echo "The car has stopped.\n";
        return new StopState();
    }
}

// === StopState is allow to drive ===
// But not allow to stop (by default)
class StopState extends CarStates
{
    public function drive()
    {
        echo "The car is driving now.\n";
        return new DriveState();
    }
}

class Car
{
    private $state;

    public function __construct(StateInterface $state)
    {
        $this->state = $state;
    }

    public function drive()
    {
        $this->setState($this->state->drive());
    }

    public function stop()
    {
        $this->setState($this->state->stop());
    }

    private function setState(StateInterface $state)
    {
        $this->state = $state;
    }
}

// ---

// The car is initially stop
$car = new Car(new StopState());

// So, it's allow to drive
$car->drive();
// Output: The car is driving now.

// Now it's driving, so,
// it's allow to stop once again
$car->stop();
// Output: The car is stopped.

// Now it has stopped, so,
// not allow to stop again
$car->stop();
// Output: You are not allow to stop.
