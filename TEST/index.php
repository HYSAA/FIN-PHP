<?php
include 'Game.php';

echo "Choose your starter Pokemon (Bulbasaur, Charmander, Squirtle): ";
$handle = fopen('php://stdin', 'r');
$playerChoice = trim(fgets($handle));
fclose($handle);

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
?>
