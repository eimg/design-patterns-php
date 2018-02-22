<?php

// === Subject ===
// Have a observer list. Where there is a change,
// iterate through observer list and invoke update()
// on each observer.
class Car
{
    protected $phones = []; // observer list
    protected $status;

    public function attach(Phone $phone)
    {
        $this->phones[] = $phone;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->notify();
    }

    public function notify() {
        foreach($this->phones as $phone) {
            $phone->update();
        }
    }
}

// === Observer ===
// Which add itself to observer-list of subject,
// by invoking attach() method of the subject.
class Phone
{
    private $car;
    public $name;

    public function __construct(Car $car, $name)
    {
        $this->name = $name;
        $this->car = $car;
        $this->car->attach($this);
    }

    public function update()
    {
        echo $this->name . " - Car is " . $this->car->getStatus() . "\n";
    }
}

// ---

$car = new Car();
$iphone = new Phone( $car, "iPhone" );
$nexus = new Phone( $car, "Nexus" );

$car->setStatus("driving");
// Output:
// iPhone - Car is driving
// Nexus - Car is driving
