<?php

// === PHP has build-in Iterator interface ===
// That enforce iteration methods such as current(),
// next(), rewind(), valid() on given collection
class CarIterator implements Iterator
{
    private $position = 0;
    private $cars;

    public function __construct(CarCollection $cars)
    {
        $this->cars = $cars;
    }

    public function current()
    {
        return $this->cars->getName($this->position);
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return !is_null($this->cars->getName($this->position));
    }
}

// === PHP has build-in IteratorAggregate interface ===
// That enforce getIterator() method to work
// in conjunction with Iterator interface
class CarCollection implements IteratorAggregate
{
    private $names = [];

    public function getIterator()
    {
        return new CarIterator($this);
    }

    public function setName($string)
    {
        $this->names[] = $string;
    }

    public function getName($key)
    {
        if (isset($this->names[$key])) {
            return $this->names[$key];
        }

        return null;
    }

    public function is_empty()
    {
        return empty($this->$names);
    }
}

// ---

$cars = new CarCollection();

$cars->setName('Fit');
$cars->setName('Vitz');
$cars->setName('Swift');

foreach($cars as $car){
    echo $car . "\n";
}

// Output:
// Fit
// Vitz
// Swift
