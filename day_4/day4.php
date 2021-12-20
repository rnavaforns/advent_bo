<?php

$nombres = [87,7,82,21,47,88,12,71,24,35,10,90,4,97,30,55,36,74,19,50,23,46,13,44,69,27,2,0,37,33,99,49,77,15,89,98,31,51,22,96,73,94,95,18,52,78,32,83,85,54,75,84,59,25,76,45,20,48,9,28,39,70,63,56,5,68,61,26,58,92,67,53,43,62,17,81,80,66,91,93,41,64,14,8,57,38,34,16,42,11,86,72,40,65,79,6,3,29,60,1];

$input = file('input_2.csv');
$cartones = [];
$carton = [];
$i = 0;
foreach ($input as $key => $fila) {
    if($fila == "\n") continue;
    $filacarton = explode(' ', $fila);
    if($filacarton[0] == "") unset($filacarton[0]);
    $filacarton = 
    array_push($carton, $filacarton);
    $i++;
    if ( $i%5 == 0 ) {
        array_push($cartones, $carton);
    }
}

foreach($nombres as $nombre) {
    foreach($cartones as $key => $carton) {
        foreach ($carton as $keyfila => $filacarton) {
            foreach ($filacarton as $keynombre => $nombre) {

            }
        }
    }
}