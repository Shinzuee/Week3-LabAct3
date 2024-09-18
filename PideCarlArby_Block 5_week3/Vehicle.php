<?php
// Base class: Vehicle
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // This method will be overridden by child classes
    public function describe() {
        return "This is a vehicle.";
    }
}

// Derived class: Car
class Car extends Vehicle {
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Interface for electric vehicles
interface ElectricVehicle {
    public function chargeBattery();
}

// Derived class: ElectricCar extends Car and implements ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery fully charged.\n";
    }

    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

// Final class: Motorcycle
final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Test the classes

// Create a Car object
$car = new Car("Toyota", "Ae86 Trueno", 1987, 4);
echo $car->getDetails() . "\n";
echo $car->describe() . "\n\n";

// Create a Motorcycle object
$motorcycle = new Motorcycle("Kawasaki", "Ninja H2R", 2015);
echo $motorcycle->getDetails() . "\n";
echo $motorcycle->describe() . "\n\n";

// Create an ElectricCar object
$electricCar = new ElectricCar("Tesla", "Model 2 RedWood", 2023, 4, 100);
echo $electricCar->getDetails() . "\n";
echo $electricCar->describe() . "\n";
$electricCar->chargeBattery();
echo $electricCar->describe() . "\n";
?>