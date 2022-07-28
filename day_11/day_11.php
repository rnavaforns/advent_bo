<?php

$input = file('day_11/input.csv');
$octopus_map = array(array());

foreach ($input as $i => $fila)
	foreach (str_split($fila) as $j => $element)
		if($j < 10) $octopus_map[$i][$j] = $element;

$count = 0;
$k = 0;
do {
	$all_flashed = 0;
	$flasheable = array_fill(0, 10, array_fill(0, 10, true));
	foreach ($octopus_map as $i => $fila) {
		foreach ($fila as $j => $octopus) {
			if (!$flasheable[$i][$j])
				continue;
			else
				suma($i, $j, $octopus_map, $flasheable, $count, $all_flashed);
		}
	}
	$k++;
} while($all_flashed < 100);

echo $k . "\n";

function sumaveins($i, $j, &$octopus_map, &$flasheable, &$count, &$all_flashed) {
	if (isvalid($i-1, $j-1) && $flasheable[$i-1][$j-1])
		suma($i-1, $j-1, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i-1, $j) && $flasheable[$i-1][$j])
		suma($i-1, $j, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i-1, $j+1) && $flasheable[$i-1][$j+1])
		suma($i-1, $j+1, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i, $j-1) && $flasheable[$i][$j-1])
		suma($i, $j-1, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i, $j+1) && $flasheable[$i][$j+1])
		suma($i, $j+1, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i+1, $j-1) && $flasheable[$i+1][$j-1])
		suma($i+1, $j-1, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i+1, $j) && $flasheable[$i+1][$j])
		suma($i+1, $j, $octopus_map, $flasheable, $count, $all_flashed);

	if (isvalid($i+1, $j+1) && $flasheable[$i+1][$j+1])
		suma($i+1, $j+1, $octopus_map, $flasheable, $count, $all_flashed);
}

function suma($i, $j, &$octopus_map, &$flasheable, &$count, &$all_flashed) {
	$octopus_map[$i][$j]++;
	if($octopus_map[$i][$j] > 9) {
		countFlash($i, $j, $count, $flasheable, $octopus_map, $all_flashed);
		sumaveins($i, $j, $octopus_map, $flasheable, $count, $all_flashed);
	}
}

function countFlash($i, $j, &$count, &$flasheable, &$octopus_map, &$all_flashed) {
	if ($flasheable[$i][$j]) {
		$flasheable[$i][$j] = false;
		++$count;
		++$all_flashed;
		$octopus_map[$i][$j] = 0;
	}
}

function isvalid($f, $c) {
	return 0 <= $f & $f <= 9 & 0 <= $c & $c <= 9;
}