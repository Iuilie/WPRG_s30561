<?php
function Suma($a, $b, $c) {
    $ciagArytmetyczny = ($c * (2 * $a + ($c - 1) * $b)) / 2;
    $ciagGeometryczny = ($a * (pow(1 + $b, $c) - 1)) / $b;

    echo "Suma ciągu arytm. $a, różnicy $b, liczbie elementów $c: $ciagArytmetyczny<br>";
    echo "Suma ciągu geom. $a, ilorazie $b, liczbie elementów $c: $ciagGeometryczny";
}

Suma(1, 2, 5);
?>