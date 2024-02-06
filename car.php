<?php

// Passenger
class Passenger {
    private $fname;
    private $lname;
    private $isDriver = false;

    public function __construct($fname, $lname) {
        $this->fname = $fname;
        $this->lname = $lname;
    }

    public function assignDriver() {
        $this->isDriver = true;
    }

    public function checkIfDriver() {
        return $this->isDriver;
    }

    public function getPassengerName() {
        return $this->fname . " " . $this->lname;
    }
}

// Car
class Car {
    private $modelName;
    private $modelType;
    private $capacity;
    private $passengers = [];
    private $driver = null;

    public function __construct($modelName, $modelType, $capacity) {
        $this->modelName = $modelName;
        $this->modelType = $modelType;
        $this->capacity = $capacity;
    }

    public function addPassenger(Passenger $passenger) {
        if ($this->checkCapacity()) {
            $this->passengers[] = $passenger;
            if ($passenger->checkIfDriver()) {
                $this->driver = $passenger;
            }
            return true;
        }
        return false;
    }

    public function checkCapacity() {
        return count($this->passengers) < $this->capacity;
    }

    public function hasDriver() {
        return !empty($this->driver);
    }

    public function getPassengers() {
        return $this->passengers;
    }
}

// Example usage
$taxi = new Car("Toyota Corolla", "sedan", 5);

$passArray = [
    new Passenger("John Leeroy", "Gadiane"),
    new Passenger("Jovelyn", "Cuizon"),
    new Passenger("Roy", "Salares"),
    new Passenger("Gene", "Abello"),
];

foreach ($passArray as $passenger) {
    if ($taxi->checkCapacity()) {
        $taxi->addPassenger($passenger);
    }
}

$driver = new Passenger("Jeoffrey", "Gudio");
$driver->assignDriver();
$taxi->addPassenger($driver);

if ($taxi->hasDriver()) {
    echo "There is a designated driver.";
} else {
    echo "There is no driver in this car.";
}

$passengers = $taxi->getPassengers();
echo "<br>The passengers are: <br>";
$counter = 0;
foreach ($passengers as $passenger) {
    $counter++;
    echo $counter . ". " . $passenger->getPassengerName();
    if ($passenger->checkIfDriver()) {
        echo " \"Driver\"";
    }
    echo "<br>";
}
