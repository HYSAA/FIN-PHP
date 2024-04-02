<?php

class Pokemon {
    protected $name;
    protected $healthPoints;

    public function __construct($name, $healthPoints = 100) {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
    }

    public function getName() {
        return $this->name;
    }

    public function getHealthPoints() {
        return $this->healthPoints;
    }

    public function attack($opponent) {
        $damage = rand(5, 15);
        $opponent->receiveDamage($damage);
    }

    protected function receiveDamage($damage) {
        $this->healthPoints -= $damage;
        echo "{$this->name} received {$damage} damage.\n";
        if ($this->healthPoints <= 0) {
            echo "{$this->name} fainted!\n";
        }
    }
}

class Bulbasaur extends Pokemon {
    public function __construct() {
        parent::__construct('Bulbasaur', 100);
    }
    public function regenerateHealth() {
        $amount = rand(10, 20);
        $this->healthPoints += $amount;
        echo "{$this->name} regenerates {$amount} health.\n";
    }
}

class Charmander extends Pokemon {
    public function __construct() {
        parent::__construct('Charmander', 100);
    }
    public function regenerateHealth() {
        $amount = rand(10, 20);
        $this->healthPoints += $amount;
        echo "{$this->name} regenerates {$amount} health.\n";
    }
}

class Squirtle extends Pokemon {
    public function __construct() {
        parent::__construct('Squirtle', 100);
    }

    public function regenerateHealth() {
        $amount = rand(10, 20);
        $this->healthPoints += $amount;
        echo "{$this->name} regenerates {$amount} health.\n";
    }
}
?>
