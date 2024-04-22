<?php
function pomnozMacierze($macierzA, $macierzB)
{
    $wierszeA = count($macierzA);
    $kolumnyA = count($macierzA[0]);
    $wierszeB = count($macierzB);
    $kolumnyB = count($macierzB[0]);

    if ($kolumnyA != $wierszeB) {
        echo "Nie można pomnożyć macierzy";
        return null;
    }

    $wynik = array_fill(0, $wierszeA, array_fill(0, $kolumnyB, 0));

    // Mnożenie macierzy
    for ($i = 0; $i < $wierszeA; $i++) {
        for ($j = 0; $j < $kolumnyB; $j++) {
            for ($k = 0; $k < $kolumnyA; $k++) {
                $wynik[$i][$j] += $macierzA[$i][$k] * $macierzB[$k][$j];
            }
        }
    }
    return $wynik;
}

$macierzA = array(
    array(1, 2, 3),
    array(4, 5, 6)
);

$macierzB = array(
    array(7, 8),
    array(9, 10),
    array(11, 12)
);

$wynik = pomnozMacierze($macierzA, $macierzB);
if ($wynik) {
    echo "Wynik mnożenia macierzy:<br>";
    foreach ($wynik as $wiersz) {
        echo implode(" ", $wiersz) . "<br>";
    }
}
?>