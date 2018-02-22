<?php

interface Filter
{
    public function check();
}

// === A Colleague ===
class OilFilter implements Filter
{
     public function check()
     {
         echo "Checking Oil Filter... OK\n";
     }
}

// === A Colleague ===
class AirFilter implements Filter
{
     public function check()
     {
         echo "Checking Air Filter... OK\n";
     }
}

// === A Mediator ===
// Collection of colleagues designed to make
// all those colleague work together
class Car
{
    protected $filters;

    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    public function check()
    {
        foreach ($this->filters as $filter) {
            $filter->check();
        }
    }
}

$car = new Car();
$car->addFilter( new OilFilter() );
$car->addFilter( new AirFilter() );
$car->check();

// Output:
// Checking Oil Filter... OK
// Checking Air Filter... OK
