<?php

function przesunElement($tablica, $n) {
    if ($n < 0 || $n >= count($tablica)) {
        echo "BŁĄD.\n";
        return;
    }

    $tablica[$n] = '$';

    $przesunietaTablica = array_values($tablica);

    return $przesunietaTablica;
}

$tablicaWejsciowa = array(1, 2, 3, 4, 5);
$pozycja = 1;

$wynik = przesunElement($tablicaWejsciowa, $pozycja);

if ($wynik !== null) {
    echo "Wynik: ";
    foreach ($wynik as $element) {
        echo $element . " ";
    }
}
?>


