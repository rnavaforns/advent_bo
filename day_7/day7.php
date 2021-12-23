<?php

$input = explode(',', file('input.csv')[0]);
$dist = array_fill(0,1900, 0);

foreach($input as $cranc) {
    for ($i = 0; $i < 1900; $i++) {
        $gauss = abs($i - $cranc)*(abs($i - $cranc)+1)/2;
        $dist[$i] += $gauss;                                    //Per la 1a part fer $dist[$i] += abs($i - $cranc)
    }
}
echo min($dist) . "\n";