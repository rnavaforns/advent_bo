<?php

$input = file('input_1_1.csv');
//die();
$count_1 = 0;
/*$primer = true;
$valor_ant = 0;
$valor_act = 0;
foreach ($input as $valor) {
    $valor_act = $valor;
    echo "hola";
    echo $valor_ant;
    echo $valor_act . "\n";
    if ($primer) {
        $valor_ant = $valor;
        $primer = false;
    } else {
        if ($valor_act > $valor_ant) {
            ++$count;
        }
        $valor_ant = $valor;
    }
}
echo $count . "\n";*/

for ($i = 1; $i < 2000; $i++) {
    if (intval($input[$i]) > intval($input[$i - 1])) ++$count_1;
}
echo  $count_1 . "\n";

$count2 = 0;
$sum_ant = intval($input[0]) + intval($input[1]) + intval($input[2]);
for ($i = 3; $i < count($input); $i++) {
    $sum_act = $sum_ant - intval($input[$i - 3]) + intval($input[$i]);
    if ($sum_act > $sum_ant) ++$count2;
    $sum_ant = $sum_act;
}
echo $count2 . "\n";