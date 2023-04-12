# PHP Assessment Test

### Problem 2:

## Update

1. In this code, it added the `Paintable` interface:

interface Paintable {
    public function isPaintDamaged(): bool;
}

2. In this code, it added the `Painting` class:

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

