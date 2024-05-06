<?php

function utworzTablice($a, $b, $c, $d) {
    $tablica = [];
    for ($i = $a; $i <= $b; $i++) {
        for ($j = $c; $j <= $d; $j++) {
            $tablica[$i][] = $j;
        }
    }
    return $tablica;
}

$a = 1;
$b = 3;
$c = 4;
$d = 6;

$mojaTablica = utworzTablice($a, $b, $c, $d);
    echo "<pre>";
    print_r($mojaTablica);
    echo "</pre>";
?>
