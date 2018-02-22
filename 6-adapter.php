<?php

interface TwoPins
{
    public function one();
    public function two();
}

interface ThreePins
{
    public function one();
    public function two();
    public function three();
}

class TwoPinsSocket implements TwoPins
{
    public function one()
    {
        echo "Pin one exists.\n";
    }

    public function two()
    {
        echo "Pin two exists.\n";
    }
}

class ThreePinsSocket implements ThreePins
{
    public function one()
    {
        echo "Pin one exists.\n";
    }

    public function two()
    {
        echo "Pin two exists.\n";
    }

    public function three()
    {
        echo "Pin three exists.\n";
    }
}

// === Adapter  ===
// which convert TwoPins object to ThreePins
class ThreePinsAdapter implements ThreePins
{
    private $socket;

    public function __construct(TwoPins $socket)
    {
        $this->socket = $socket;
    }

    public function one()
    {
        $this->socket->one();
    }

    public function two()
    {
        $this->socket->two();
    }

    public function three()
    {
        echo "Pin three doesn't exists, but it's OK.\n";
    }
}

class Lamp
{
    private $socket;

    public function __construct(ThreePins $socket)
    {
        $this->socket = $socket;
    }

    public function turnOn() {
        $this->socket->one();
        $this->socket->two();
        $this->socket->three();
    }
}

// ---

$threepins = new ThreePinsSocket();
$twopins = new ThreePinsAdapter(new TwoPinsSocket());

$lamp1 = new Lamp($threepins);
$lamp1->turnOn();
// Output:
// Pin one exists.
// Pin two exists.
// Pin three exists.

$lamp2 = new Lamp($twopins);
$lamp2->turnOn();
// Output:
// Pin one exists.
// Pin two exists.
// Pin three doesn't exists, but it's OK.
