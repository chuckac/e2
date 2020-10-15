<?php

// player rolls a dice value of 1-20
// player has zero attack points

$dicerollplayer = rand(1, 20);

$dicerolldragon = rand(1, 20);

// dragon stats and power

$dragons = [
    'dragon1' => ['dragontype' => 'Blue Dragon', 'attackpower' => 11, 'attacktype' => 'waterjet'],
    'dragon2' => ['dragontype' => 'Red Dragon', 'attackpower' => 3, 'attacktype' => 'weak fire'],
    'dragon3' => ['dragontype' => 'Black Dragon', 'attackpower' => 5, 'attacktype' => 'smoke'],
    'dragon4' => ['dragontype' => 'Gold Dragon', 'attackpower' => 18, 'attacktype' => 'phoenix of the blazing sun mega light'],
];

$battledragon = $dragons[array_rand($dragons)];

$dragonattack = $battledragon['attackpower'] + $dicerolldragon;

if ($dragonattack > $dicerollplayer) {
    $playeroutcome = 'lose!';
    $playeraccolade = 'Wah. Wah. Wah. Waaaaaaaaah.';
} elseif ($dicerollplayer > $dragonattack) {
    $playeroutcome = 'win!';
    $playeraccolade = 'You are dubbed Sir PHP - Slayer of the Digital Serpent!';
} else {
    $playeroutcome = 'tied. I did not know you could do that with a dragon.';
    $playeraccolade = 'Well, this is awkward...  I guess go and do some good as a team.';
}

require 'index_view.php';
