<?php

interface Engine
{
    public function run();
}

class Diesel implements Engine
{
    public function run()
    {
        echo "Broom! Broom!\n";
    }
}

class Petrol implements Engine
{
    public function run()
    {
        echo "Wroom! Wroom!\n";
    }
}

// === EngineBridge ===
// That help us switch engine type
// at run-time through set() method
class EngineBridge
{
    public $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function set(Engine $engine)
    {
        $this->engine = $engine;
    }
}

// ---

$diesel = new Diesel();
$petrol = new Petrol();

$bridge = new EngineBridge($diesel);
$bridge->engine->run();
// Output:
// Broom! Broom!

$bridge->set($petrol);
$bridge->engine->run();
// Output:
// Wroom! Wroom!
