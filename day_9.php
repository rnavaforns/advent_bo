<?php

$input = file('input2.csv');
$isinbasin = array_fill(0, 5, array_fill(0, 10, 1));

foreach ($input as $f => $fila) {
	$input[$f] = str_split($fila);
	foreach ($input[$f] as $c => $num) {
		if ($input[$f][$c] == "\n") array_splice($input[$f], $c);
	}
}

foreach ($input as $f => $fila) {
	foreach ($fila as $c => $num) {
		if ($input[$f][$c] == 9) $isinbasin[$f][$c] = 0;
		echo countbasin($input, $isinbasin, intval($num), $f, $c);
	}
	echo "\n";
}
echo "\n";

$count = array();

foreach ($isinbasin as $f => $fila) {
	foreach ($fila as $c => $num) {
		//$value = valuebasin($isinbasin, $f, $c);
		//array_push($count, $value);
		echo $isinbasin[$f][$c];
	}
	echo "\n";
}

rsort($count);

for ($i = 0; $i < 3; $i++) echo $count[$i] . ' ';
echo "\n";


function checkneighbours ($input, $num, $f, $c) {
	if (isvalid($f - 1, $c))
		if (intval($input[$f - 1][$c]) <= $num)
			return 0;
	if (isvalid($f + 1, $c))
		if(intval($input[$f + 1][$c]) <= $num)
			return 0;
	if (isvalid($f, $c - 1))
		if(intval($input[$f][$c - 1]) <= $num)	
			return 0;
	if (isvalid($f, $c + 1))
		if(intval($input[$f][$c + 1]) <= $num)
			return 0;
	return $num + 1;
}

function valuebasin(&$isinbasin, $f, $c) {
	if (!isvalid($f, $c)) return;
	if ($isinbasin[$f][$c] == 0) return 0;
	return $isinbasin[$f][$c] + valuebasin($isinbasin, $f - 1, $c) + valuebasin($isinbasin, $f + 1, $c) + valuebasin($isinbasin, $f, $c - 1) + valuebasin($isinbasin, $f, $c + 1);

}

function countbasin (&$input, &$isinbasin, $num, $f, $c) {
	if ($num == 9)
		return $isinbasin[$f][$c] = 0;

	if (isvalid($f - 1, $c)) {
		if (intval($input[$f - 1][$c]) == $num + 1) {
			return 1 + countbasin($input, $isinbasin, intval($input[$f - 1][$c]), $f - 1, $c);
		}
	}
	if (isvalid($f + 1, $c)) {
		if(intval($input[$f + 1][$c]) == $num + 1) {
			return 1 + countbasin($input, $isinbasin, intval($input[$f + 1][$c]), $f + 1, $c);
		}
	}
	if (isvalid($f, $c - 1)) {
		if(intval($input[$f][$c - 1]) == $num + 1) {
			return 1 + countbasin($input, $isinbasin, intval($input[$f][$c - 1]), $f, $c - 1);
		}
	}
	if (isvalid($f, $c + 1)) {
		if(intval($input[$f][$c + 1]) == $num + 1) {
			return 1 + countbasin($input, $isinbasin, intval($input[$f][$c + 1]), $f, $c + 1);
		}
	}
	return $isinbasin[$f][$c];
}

function isvalidd($f, $c) {
	return 0 <= $f & $f <= 99 & 0 <= $c & $c <= 100;
}
function isvalid($f, $c) {
	return 0 <= $f & $f <= 4 & 0 <= $c & $c <= 9;
}