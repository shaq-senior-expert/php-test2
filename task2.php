<?php 

// Define a Paintable interface with a single method isPaintDamaged()
interface Paintable {
    public function isPaintDamaged(): bool;
}

// Define an abstract class CarDetail that implements Paintable interface and contains a protected property isBroken
abstract class CarDetail implements Paintable {
    protected $isBroken;
    
    // Define a constructor that accepts a boolean parameter isBroken and sets it to the protected property isBroken
    public function __construct(bool $isBroken) {
        $this->isBroken = $isBroken;
    }
    
    // Define a method isBroken that returns the value of isBroken property
    public function isBroken(): bool {
        return $this->isBroken;
    }
    
    // Provide a default implementation for the isPaintDamaged method that returns false, for non-paintable details
    public function isPaintDamaged(): bool {
        return false; 
    }
}

// Define two concrete classes Door and Tyre, which inherit from CarDetail

class Door extends CarDetail {
    
}

class Tyre extends CarDetail {
    
}

// Define a Painting class that implements Paintable interface and contains a protected property paintCondition
class Painting implements Paintable {
    protected $paintCondition;
    
    // Define a constructor that accepts a boolean parameter paintCondition and sets it to the protected property paintCondition
    public function __construct(bool $paintCondition) {
        $this->paintCondition = $paintCondition;
    }
    
    // Define the isPaintDamaged method that returns the value of paintCondition property
    public function isPaintDamaged(): bool {
        return $this->paintCondition;
    }
}

// Define a Car class that contains an array of CarDetail objects
class Car {
    /**
     * @var CarDetail[]
     */
    private $details;
    
    // Define a constructor that accepts an array of CarDetail objects and sets it to the private property details
    public function __construct(array $details) {
        $this->details = $details;
    }
    
    // Define a method isBroken that iterates through the array of details and returns true if any detail is broken, otherwise false
    public function isBroken(): bool {
        foreach ($this->details as $detail) {
            if ($detail->isBroken()) {
                return true;
            }
        }
        return false;
    }
    
    // Define a method isPaintingDamaged that iterates through the array of details and returns true if any Paintable detail has a damaged paint, otherwise false
    public function isPaintingDamaged(): bool {
        foreach ($this->details as $detail) {
            if ($detail instanceof Paintable && $detail->isPaintDamaged()) {
                return true;
            }
        }
        return false;
    }
}

// Create a new Car object with an array of details consisting of one Door object, one Tyre object, and one Painting object
$car = new Car([new Door(true), new Tyre(true), new Painting(true)]);

// Call the isPaintingDamaged method of the Car object and print the result
echo $car->isPaintingDamaged(); // Output: false

?>