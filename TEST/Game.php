<?php

include 'Pokemon.php';

class Game {
    protected $player;
    protected $opponent;

    public function __construct($player, $opponent) {
        $this->player = $player;
        $this->opponent = $opponent;
    }

    public function playRound() {
        $this->playerMove()->opponentMove();
    }

    protected function playerMove() {
        $move = rand(1, 3); // 1: Tackle, 2: Skill Attack, 3: Regenerate Health
        switch ($move) {
            case 1:
                echo "{$this->player->getName()} uses tackle.\n";
                $this->player->tackle($this->opponent);
                break;
            case 2:
                echo "{$this->player->getName()} uses skill attack.\n";
                $this->player->skillAttack($this->opponent);
                break;
            case 3:
                echo "{$this->player->getName()} regenerates health.\n";
                $this->player->regenerateHealth();
                break;
        }
        return $this;
    }

    protected function opponentMove() {
        $move = rand(1, 2); // 1: Tackle, 2: Skill Attack
        switch ($move) {
            case 1:
                echo "{$this->opponent->getName()} uses tackle.\n";
                $this->opponent->tackle($this->player);
                break;
            case 2:
                echo "{$this->opponent->getName()} uses skill attack.\n";
                $this->opponent->skillAttack($this->player);
                break;
        }
        return $this;
    }
}

// Example Usage
echo "Choose your starter Pokemon (Bulbasaur, Charmander, Squirtle): ";
$playerChoice = trim(fgets(STDIN));
switch ($playerChoice) {
    case 'Bulbasaur':
        $player = new Bulbasaur();
        break;
    case 'Charmander':
        $player = new Charmander();
        break;
    case 'Squirtle':
        $player = new Squirtle();
        break;
    default:
        echo "Invalid choice!";
        exit;
}

$opponentChoices = [new Bulbasaur(), new Charmander(), new Squirtle()];
$opponent = $opponentChoices[array_rand($opponentChoices)];

$game = new Game($player, $opponent);

for ($i = 1; $i <= 5; $i++) {
    echo "Round {$i}\n";
    $game->playRound();
    echo "\n";
}
