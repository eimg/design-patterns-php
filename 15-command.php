<?php

class Lamp
{
    public function open()
    {
        echo "Lamp is opened.\n";
    }

    public function close()
    {
        echo "Lamp is closed.\n";
    }
}

interface Button
{
    public function execute();
}

// === A command that can be executed on Lamp ===
class SwitchUp implements Button
{
    public $lamp;

    public function __construct(Lamp $lamp)
    {
        $this->lamp = $lamp;
    }

    public function execute()
    {
        $this->lamp->open();
    }
}

// === A command that can be executed on Lamp ===
class SwitchDown implements Button
{
    public $lamp;

    public function __construct(Lamp $lamp)
    {
        $this->lamp = $lamp;
    }

    public function execute()
    {
        $this->lamp->close();
    }
}

// === A Collection ===
// That accept and execute commands
class Commands
{
    public $commands = [];

    public function add(Button $button)
    {
        $commands[] = $button;
        $button->execute();
    }
}

// ---

$lamp = new Lamp();
$up = new SwitchUp($lamp);
$down = new SwitchDown($lamp);

$commands = new Commands();
$commands->add($up);
// Output: Lamp is opened.

$commands->add($down);
// Output: Lamp is closed.
