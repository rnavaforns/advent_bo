<?php

$input = file('input.csv');

$horizontal1 = 0;
$vertical1 = 0;
$aim = 0;
$vertical2 = 0;

foreach ($input as $moviment) {
    $moviment = explode(' ', $moviment);
    if ($moviment[0] == 'up') {
        $vertical1 = $vertical1 - intval($moviment[1]);
        $aim = $aim - intval($moviment[1]);
    } else if ($moviment[0] == 'down') {
        $vertical1 = $vertical1 + intval($moviment[1]);
        $aim = $aim + intval($moviment[1]);
    } else {
        $horizontal1 = $horizontal1 + intval($moviment[1]);
        $vertical2 = $vertical2 + $aim*intval($moviment[1]);
    }
}

echo $horizontal1 * $vertical1 . "\n";
echo $horizontal1 * $vertical2 . "\n";