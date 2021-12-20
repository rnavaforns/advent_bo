<?php

$input = [2,4,1,5,1,3,1,1,5,2,2,5,4,2,1,2,5,3,2,4,1,3,5,3,1,3,1,3,5,4,1,1,1,1,5,1,2,5,5,5,2,3,4,1,1,1,2,1,4,1,3,2,1,4,3,1,4,1,5,4,5,1,4,1,2,2,3,1,1,1,2,5,1,1,1,2,1,1,2,2,1,4,3,3,1,1,1,2,1,2,5,4,1,4,3,1,5,5,1,3,1,5,1,5,2,4,5,1,2,1,1,5,4,1,1,4,5,3,1,4,5,1,3,2,2,1,1,1,4,5,2,2,5,1,4,5,2,1,1,5,3,1,1,1,3,1,2,3,3,1,4,3,1,2,3,1,4,2,1,2,5,4,2,5,4,1,1,2,1,2,4,3,3,1,1,5,1,1,1,1,1,3,1,4,1,4,1,2,3,5,1,2,5,4,5,4,1,3,1,4,3,1,2,2,2,1,5,1,1,1,3,2,1,3,5,2,1,1,4,4,3,5,3,5,1,4,3,1,3,5,1,3,4,1,2,5,2,1,5,4,3,4,1,3,3,5,1,1,3,5,3,3,4,3,5,5,1,4,1,1,3,5,5,1,5,4,4,1,3,1,1,1,1,3,2,1,2,3,1,5,1,1,1,4,3,1,1,1,1,1,1,1,1,1,2,1,1,2,5,3];

//6.1
/*for ($i = 0; $i < 80; $i++) {
    $add_fish = 0;
    foreach ($input as $key => $fish) {
        if ($input[$key] == 0) {
            $input[$key] = 6;
            $add_fish++;
        } else $input[$key]--;
    }
    for ($count = 0; $count < $add_fish; $count++) {
        array_push($input, 8);
    }
}

echo count($input);
*/

//6.2 Actually an improvement of 6.1
$estats = [0,0,0,0,0,0,0,0,0];
foreach ($input as $fish) {
    $estats[$fish]++;
}
echo array_sum($estats) . "\n";

for ($i = 0; $i < 80; $i++) {
    $aux0 = $estats[0];
    $aux1 = $estats[1];
    $aux2 = $estats[2];
    $aux3 = $estats[3];
    $aux4 = $estats[4];
    $aux5 = $estats[5];
    $aux6 = $estats[6];
    $aux7 = $estats[7];
    $aux8 = $estats[8];
    $estats[8] = $aux0;
    $estats[7] = $aux8;
    $estats[6] = $aux7 + $aux0;
    $estats[5] = $aux6;
    $estats[4] = $aux5;
    $estats[3] = $aux4;
    $estats[2] = $aux3;
    $estats[1] = $aux2;
    $estats[0] = $aux1;
}

echo array_sum($estats) . "\n";