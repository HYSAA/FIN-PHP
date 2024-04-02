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
                $this->player->attack($this->opponent);
                break;
            case 2:
                echo "{$this->player->getName()} uses skill attack.\n";
                $this->player->attack($this->opponent);
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
                $this->opponent->attack($this->player);
                break;
            case 2:
                echo "{$this->opponent->getName()} uses skill attack.\n";
                $this->opponent->attack($this->player);
                break;
        }
        return $this;
    }
}
?>
