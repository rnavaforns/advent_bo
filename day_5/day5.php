<?php

$input = file('input.csv');
//$rectes = [];
$campo = [];
$count = 0;
for ($i = 0; $i < 989; $i++) {
    //array_push($campo, range(0, 990));
    $campo[$i] = array_fill(0, 991, 0);
}
//echo $campo[345][345];
//die();

foreach($input as $parell) {
    $punts = explode(' -> ', $parell);
    $inici = array_map('intval', explode(',', $punts[0]));
    $final = array_map('intval', explode(',', $punts[1]));
    if ($inici[0] == $final[0]) {
        $min = min($inici[1], $final[1]);
        $max = max($inici[1], $final[1]);
        for ($j = $min; $j <= $max; $j++) {
            if($campo[$inici[0]][$j] < 2) {
                $campo[$inici[0]][$j]++;
                if($campo[$inici[0]][$j] == 2) ++$count;
            }
        }
    } else if ($inici[1] == $final[1]) {
        $min = min($inici[0], $final[0]);
        $max = max($inici[0], $final[0]);
        for ($i = $min; $i <= $max; $i++) {
            if($campo[$i][$inici[1]] < 2) {
                $campo[$i][$inici[1]]++;
                if($campo[$i][$inici[1]] == 2) ++$count;
            }
        }
    } else if ( abs($inici[1] - $final[1]) == abs($inici[0] - $final[0]) ){
        $diff = abs($inici[1] - $final[1]);
        if ($inici[0] < $final[0]) {                                                    //inici per dalt de final
            if ($inici[1] < $final[1]) {                                                //inici a dalt a l'esquerra de final
                for ($i = 0; $i <= $diff; $i++) {
                    if ( $campo[$inici[0] + $i][$inici[1] + $i] < 2 ) {
                        $campo[$inici[0] + $i][$inici[1] + $i]++;
                        if ($campo[$inici[0] + $i][$inici[1] + $i] == 2) ++$count;
                    }
                }
            } else {
                for ($i = 0; $i <= $diff; $i++) {
                    if ( $campo[$inici[0] + $i][$inici[1] - $i] < 2 ) {
                        $campo[$inici[0] + $i][$inici[1] - $i]++;
                        if ($campo[$inici[0] + $i][$inici[1] - $i] == 2) ++$count;
                    }
                }
            }
        } else {
            if ($inici[1] < $final[1]) {
                for ($i = 0; $i <= $diff; $i++) {
                    if ( $campo[$inici[0] - $i][$inici[1] + $i] < 2 ) {
                        $campo[$inici[0] - $i][$inici[1] + $i]++;
                        if ($campo[$inici[0] - $i][$inici[1] + $i] == 2) ++$count;
                    }
                }
            } else {
                for ($i = 0; $i <= $diff; $i++) {
                    if ( $campo[$inici[0] - $i][$inici[1] - $i] < 2 ) {
                        $campo[$inici[0] - $i][$inici[1] - $i]++;
                        if ($campo[$inici[0] - $i][$inici[1] - $i] == 2) ++$count;
                    }
                }
            }
        }
    }
}
echo $count . "\n";