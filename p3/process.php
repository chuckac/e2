<?php

session_start();

$playerchoice = $_GET['pathchoice'];

$playerpaths = [
    'ice' => ['playerpower' => 'Path of Cold Ice', 'powerbonus' => 12, 'powerattack' => 'blizzard'],
    'fire' => ['playerpower' => 'Path of Toasty Fire', 'powerbonus' => 2, 'powerattack' => 'cheap gas station lighter'],
    'wind' => ['playerpower' => 'Path of the Gentle Breeze', 'powerbonus' => 15, 'powerattack' => 'mighty sneeze due to allergies'],
    'water' => ['playerpower' => 'Path of the Water Droplet', 'powerbonus' => 10, 'powerattack' => 'dirty bath water'],
    'heart' => ['playerpower' => 'Path of Peace & Love', 'powerbonus' => 25, 'powerattack' => 'hugs from a million hippies'],
];

$attackpower = $playerpaths[$playerchoice]['powerbonus'];

$dicerollplayer = rand(1, 20);

$playerattack = $attackpower + $dicerollplayer;

$dicerolldragon = rand(1, 20);

// dragon stats and power

$dragons = [
    'dragon1' => ['dragontype' => 'Blue Dragon', 'attackpower' => 15, 'attacktype' => 'waterjet'],
    'dragon2' => ['dragontype' => 'Red Dragon', 'attackpower' => 8, 'attacktype' => 'weak fire'],
    'dragon3' => ['dragontype' => 'Black Dragon', 'attackpower' => 10, 'attacktype' => 'smoke'],
    'dragon4' => ['dragontype' => 'Gold Dragon', 'attackpower' => 27, 'attacktype' => 'phoenix of the blazing sun mega light'],
    'dragon5' => ['dragontype' => 'Grey Dragon', 'attackpower' => 20, 'attacktype' => 'deadly assassin poison'],
    'dragon6' => ['dragontype' => 'Fuchsia Dragon', 'attackpower' => 17, 'attacktype' => 'cherry petal tornado'],
];

$battledragon = $dragons[array_rand($dragons)];

$dragonattack = $battledragon['attackpower'] + $dicerolldragon;

if ($playerattack > $dragonattack) {
    $playeroutcome = 'win';
} elseif ($playerattack < $dragonattack) {
    $playeroutcome = 'lose';
} else {
    $playeroutcome = 'tie';
}

$_SESSION['fightoutcome'] = [
    'wizardattack' => $playerpaths[$playerchoice]['powerattack'],
    'pathpower' => $playerpaths[$playerchoice]['powerbonus'],
    'dicerollplayer' => $dicerollplayer,
    'dragontype' => $battledragon['dragontype'],
    'dragonattack' => $battledragon['attacktype'],
    'dragonap' => $dragonattack,
    'wizardap' => $playerattack,
    'dicerollplayer' => $dicerollplayer,
    'dicerolldragon' => $dicerolldragon,
    'playeroutcome' => $playeroutcome,
];

header('Location: index.php');