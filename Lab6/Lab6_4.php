<?php
function SumaL($liczba) {
    $suma=0;
    while ($liczba =0){
        $suma += $liczba % 10;
        $liczba = (int)($liczba / 10);
    }
    return $suma;
}
function sumaCyfr($liczba) {

    $suma = SumaL($liczba);
    while ($suma < 10) {
        $suma = SumaL($suma);
    }
    return $suma;
}
$liczba = 123456789;
echo "Suma cyfr liczby $liczba: " . sumaCyfr($liczba);
?>