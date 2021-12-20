<?php

$input = file('input.csv');

$zeros = [0,0,0,0,0,0,0,0,0,0,0,0];
$uns   = [0,0,0,0,0,0,0,0,0,0,0,0];
$oxigen = [];
$co2 = [];
foreach ($input as $analisi) {
    if ($analisi[0] == 0) ++$zeros[0];
    else ++$uns[0];   
    if ($analisi[1] == 0) ++$zeros[1];
    else ++$uns[1];
    if ($analisi[2] == 0) ++$zeros[2];
    else ++$uns[2];
    if ($analisi[3] == 0) ++$zeros[3];
    else ++$uns[3];
    if ($analisi[4] == 0) ++$zeros[4];
    else ++$uns[4];
    if ($analisi[5] == 0) ++$zeros[5];
    else ++$uns[5];
    if ($analisi[6] == 0) ++$zeros[6];
    else ++$uns[6];
    if ($analisi[7] == 0) ++$zeros[7];
    else ++$uns[7];
    if ($analisi[8] == 0) ++$zeros[8];
    else ++$uns[8];
    if ($analisi[9] == 0) ++$zeros[9];
    else ++$uns[9];
    if ($analisi[10] == 0) ++$zeros[10];
    else ++$uns[10];
    if ($analisi[11] == 0) ++$zeros[11];
    else ++$uns[11];
}
$gammaa = [];
$epsilona = [];
$gamma = 0;
$epsilon = 0;

/*for ($i = 0; $i < 12; $i++) {
    $gammaa[$i] = ($zeros[$i] > $uns[$i]) ? 0 : 1;
    $gamma = $gamma + $gammaa[$i]*pow(2, 11 - $i);
    $epsilona[$i] = ($zeros[$i] < $uns[$i]) ? 0 : 1;
    $epsilon = $epsilon + $epsilona[$i]*pow(2, 11 - $i);
}*/

$ogr = $input;
$co2gr = $input;

for ($i = 0; $i < 12; $i++ ) {
    if (count($ogr) > 1) {
        $oxigen_0 = [];
        $oxigen_1 = [];
        foreach ($ogr as $key => $analisi) {
            if ($analisi[$i] == 1) array_push( $oxigen_1, $analisi );
            else array_push( $oxigen_0 , $analisi);
        }
        if ( count($oxigen_1) >= count($oxigen_0) ) $ogr = array_diff($ogr, $oxigen_0);
        else $ogr = array_diff($ogr, $oxigen_1);
    }
    //else $ogr = array_values($ogr)[0];
    if (count($co2gr) > 1) {
        $co2_0 = [];
        $co2_1 = [];
        foreach ($co2gr as $key => $analisi) {
            if ($analisi[$i] == 1) array_push( $co2_1, $analisi );
            else array_push( $co2_0 , $analisi);
        }
        if ( count($co2_0) <= count($co2_1) ) $co2gr = array_diff($co2gr, $co2_1);
        else $co2gr = array_diff($co2gr, $co2_0);
    }
    //else $co2gr = array_values($co2gr)[0];
}
$ogr = base_convert(array_values($ogr)[0], 2, 10);
$co2gr = base_convert(array_values($co2gr)[0], 2, 10);

echo $ogr * $co2gr . "\n";