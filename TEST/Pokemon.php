<?php

class Pokemon {
    protected $name;
    protected $healthPoints;
    protected $manaPoints;
    protected $chargePoints;

    public function __construct($name, $healthPoints = 100, $manaPoints = 100, $chargePoints = 0) {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->manaPoints = $manaPoints;
        $this->chargePoints = $chargePoints;
    }

    public function getName() {
        return $this->name;
    }

    public function getHealthPoints() {
        return $this->healthPoints;
    }

    public function getManaPoints() {
        return $this->manaPoints;
    }

    public function getChargePoints() {
        return $this->chargePoints;
    }

    public function tackle($opponent) {
        $damage = rand(5, 15);
        $opponent->receiveDamage($damage);
        return $this;
    }

    public function skillAttack($opponent) {
        if ($this->manaPoints >= 3) {
            $damage = rand(10, 20);
            $opponent->receiveDamage($damage);
            $this->manaPoints -= 3;
        } else {
            echo "Not enough mana points to perform a skill attack!\n";
        }
        return $this;
    }

    public function regenerateHealth() {
        if ($this->chargePoints >= 3) {
            $this->healthPoints += 3;
            $this->chargePoints -= 3;
            echo "{$this->name} regenerated 3 health points.\n";
        } else {
            echo "Not enough charge points to regenerate health!\n";
        }
        return $this;
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
        parent::__construct('Bulbasaur', 100, 100, 0);
    }
}

class Charmander extends Pokemon {
    public function __construct() {
        parent::__construct('Charmander', 100, 100, 0);
    }
}

class Squirtle extends Pokemon {
    public function __construct() {
        parent::__construct('Squirtle', 100, 100, 0);
    }
}
